

function activate(event) {
    var element = document.querySelector(".input");
    element.classList.add("active");
    event.preventDefault();
}
function deactivate(event) {
    var element = document.querySelector(".input");
    //element.value =''
    if (document.querySelector('.input').value == '') {
        element.value = ''
        element.classList.remove("active");
    }
    event.preventDefault();

}

class Student {

    bundleSize = 50
    async intitTable() {
        sessionStorage.setItem('startIndex', 1);
        sessionStorage.setItem('totalCount', 0);
        sessionStorage.setItem('endOfData', 'false');

        let data = await this.fetchNext();
        ////console.log(data)
        if (data.length > 0) {
            ////console.log(data[0]['total_count'])
            sessionStorage.setItem('totalCount', data[0]['total_count']);
            let table = document.querySelector('.table');
            let thead = document.createElement('thead');
            let tr = document.createElement('tr');
            Object.entries(data[0]).slice().reverse().splice(1).forEach(
                ([key, value]) => {
                    let th = document.createElement('th');
                    th.innerText = key;
                    tr.appendChild(th);

                });

            thead.appendChild(tr);
            table.appendChild(thead);
            ////console.log(table)
        }
        this.updateTable(data);

        //window.location.reload();


    }


    updateTable(data) {
        console.log(data.length)
        let table = document.querySelector('table');
        let tbody = document.createElement('tbody');
        if (data.length <1 && document.querySelector('.input').value !=''){
            document.querySelector(".message span").innerText ='لا يوجد بيانات تطابق البحث';
            document.querySelector(".message span").classList.add("activ");
        }else{
            document.querySelector(".message span").classList.remove("activ");
        }
        data.forEach(element => {

            let tr = document.createElement('tr');
            Object.entries(element).slice().reverse().splice(1).forEach(
                ([key, value]) => {
                    let td = document.createElement('td');
                    td.innerText = value
                    tr.appendChild(td)
                }
            );
            tbody.appendChild(tr);
        });
        //console.log(document.getElementsByTagName('tr').length-1)
        if (document.getElementsByTagName('tr').length - 1 >= parseInt(sessionStorage.getItem('totalCount'))) {
            sessionStorage.setItem('endOfData', 'true');

        }
        table.appendChild(tbody);
        hideSnackBar()

    }

    async fetchNext() {
        //console.log('called');
        let data = [];
        //console.log(parseInt(sessionStorage.getItem('startIndex')));
        //console.log(parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize);
        let bodyString = "startIndex=" + parseInt(sessionStorage.getItem('startIndex')) + "&lastIndex=" + (parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize)
        if (document.querySelector('.input').value != '') bodyString += `&queryString=${document.querySelector('.input').value}`
       
        await fetch("/commerceCenterSite/api/student/student.php", {
            method: 'Post',
            body: bodyString,
            // {
            //     "startIndex": 20,
            //     "lastIndex": 40

            // },
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'json'
            }
        }).then((response) => {
            console.log(response);
            if (response.status == 200) {
                return response.json()
            }

        }).then((res) => {
            data = res
            //console.log(res)

        }).catch((error) => {
            ////console.log(error)
        })

        sessionStorage.setItem('startIndex', parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize + 1);
        return data

    }

    loadJSON() {

        return new Promise(function (resolve, reject) {

            fetch('sample.json')
                .then(response => response.json())
                .then(data => {
                    resolve(data)
                })
                .catch(error => reject(error));

        })


    }

}

function showSnackBar() {
    // Get the snackbar DIV
    let x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    //setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function hideSnackBar() {
    let x = document.getElementById("snackbar");
    x.className = x.className.replace("show", "");
    sessionStorage.setItem("isProcessing", 'false')
}


let student = new Student();
student.intitTable();
sessionStorage.setItem("isProcessing", 'false')

window.addEventListener('scroll', () => {
    ////console.log(sessionStorage.getItem("endOfData"))
    if (
        window.scrollY + window.innerHeight >= document.body.offsetHeight &&
        sessionStorage.getItem("isProcessing") != 'true' &&
        sessionStorage.getItem("endOfData") != 'true'

    ) {
        ////console.log(sessionStorage.getItem('isProcessing'))
        showSnackBar();
        sessionStorage.setItem("isProcessing", 'true');
        (async () => {
            setTimeout(async function () {
                student.updateTable(await student.fetchNext());
            }, 1000);
        })();
    }
});

var regex = new RegExp("^[\u0621-\u064A0-9a-zA-Z ]*$");
document.querySelector('.input').addEventListener('input', (event) => {
    
    if (regex.test(document.querySelector('.input').value)) {
        var element = document.querySelector(".message span").classList.remove("activ");
        sessionStorage.setItem('startIndex', 1);
        sessionStorage.setItem('totalCount', 0);
        sessionStorage.setItem('endOfData', 'false');
        console.log('sssssssssssss');
        document.querySelector('table').innerHTML = '';


        let student = new Student();
        student.intitTable();
        sessionStorage.setItem("isProcessing", 'false');
    } else {
        document.querySelector(".message span").innerText ='مسموح فقط بلارقام والحروف العربيه والانجليزيه';
        var element = document.querySelector(".message span").classList.add("activ");
       
       
    }

    // if (document.querySelector('.input').value == '') {
    //     document.querySelector('.input').value  = ''
    //     document.querySelector('.input').remove("active");
    // }
    // if (event.target.value == '') {

    //     (async () => {
    //         setTimeout(async function () {
    //             student.updateTable(await student.fetchNext());
    //         }, 1000);
    //     })();
    // }
    // else{
    //     (async () => {
    //         setTimeout(async function () {
    //             student.updateTable(await student.fetchNext(event.target.value));
    //         }, 1000);
    //     })();


    // }
});