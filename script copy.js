

function activate() {
    var element = document.querySelector(".input");
    element.classList.add("active");
}
function deactivate() {
    var element = document.querySelector(".input");
    document.search.txt.value = ''
    element.classList.remove("active");

}
function submit(event) {
    console.log('ssssssssssss')
    document.search.txt.value = ''
    event.preventDefault();
}

class Student {

    bundleSize = 50
    async intitTable() {
        sessionStorage.setItem('startIndex', 1);
        sessionStorage.setItem('totalCount', 0);
        sessionStorage.setItem('endOfData', 'false');

        let data = await this.fetchNext();
        //console.log(data)
        if (data.length > 0) {
            //console.log(data[0]['total_count'])
            sessionStorage.setItem('totalCount', data[0]['total_count']);
            let table = document.querySelector('.table');
            let tr = document.createElement('tr');
            Object.entries(data[0]).slice().reverse().splice(1).forEach(
                ([key, value]) => {
                    let th = document.createElement('th');
                    th.innerText = key;
                    tr.appendChild(th);

                });

            table.appendChild(tr);
            //console.log(table)
        }
        this.updateTable(data);

        //window.location.reload();


    }


    updateTable(data) {
        
        // if(parseInt(sessionStorage.getItem('totalCount'))!=0 && parseInt(sessionStorage.getItem(data[data.length-1]['id'])) >= parseInt(sessionStorage.getItem('totalCount')) ){
        //     sessionStorage.setItem('endOfData','true');
        //     return;
        // }
    
        var table = document.querySelector('table');

        data.forEach(element => {

            let tr = document.createElement('tr');
            Object.entries(element).slice().reverse().splice(1).forEach(
                ([key, value]) => {
                    let td = document.createElement('td');
                    td.innerText = value
                    tr.appendChild(td)
                }
            );
            table.appendChild(tr);
        });
        console.log(document.getElementsByTagName('tr').length-1)
        if(document.getElementsByTagName('tr').length-1 >=parseInt(sessionStorage.getItem('totalCount'))){
            sessionStorage.setItem('endOfData','true');
            
        }
        hideSnackBar()

    }

    async fetchNext() {
        console.log('called');
        let data = [];

        // jQuery.ajax({
        //     type: "Post",
        //     url: '/commerceCenterSite/api/student/student.php',


        //     success: function (obj, textstatus) {
        //                   if( !('error' in obj) ) {
        //                     data = obj.result;
        //                     console.log(obj.result)
        //                   }
        //                   else {
        //                       console.log(obj.error);
        //                   }
        //             }
        // });

        // let bd = new FormData();

        // bd.append(
        //     {
        //     "startIndex": 20,
        //     "lastIndex": 40
        //     }
        //);
        await fetch("/commerceCenterSite/api/student/student.php", {
            method: 'Post',
            body: "startIndex="  + parseInt(sessionStorage.getItem('startIndex')) + "&lastIndex=" +parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize,
            // {
            //     "startIndex": 20,
            //     "lastIndex": 40
            
            // },
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Accept':'json'
            }
        }).then((response) => {
            console.log(response)
            if (response.status == 200) {
                return response.json()
            }

        }).then((res) => {
            data = res
            console.log(res)

        }).catch((error) => {
            console.log(error)
        })


        //let data = await this.loadJSON();
        //let slice = data.slice(parseInt(sessionStorage.getItem('startIndex')), parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize);
        //console.log(slice)

        sessionStorage.setItem('startIndex', parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize);

        //return slice;
        return data





        // fetch('./students.json')
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log(data)


        //     })
        //     .catch(error => console.log(error));

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
    //  loadJSON() {
    //     return new Promise(function (resolve, reject) {

    //         var xobj = new XMLHttpRequest();
    //         xobj.overrideMimeType("application/json");

    //         xobj.open('GET', 'sample.json', true); // Replace 'my_data' with the path to your file
    //         xobj.onreadystatechange = function () {
    //             if (xobj.readyState == 4 && xobj.status == "200") {
    //                 // Required use of an anonymous callback as .open will NOT return a value but simply returns undefined in asynchronous mode
    //                 resolve(xobj.responseText);
    //             }
    //             else(
    //                 reject(xobj.readyState)
    //             )
    //         };
    //         xobj.send(null);

    //     })
    //     return new Promise(function (resolve, reject) {
    //         fetch('sample.json')
    //         .then(response => response.json())
    //         .then(data => {
    //            resolve(data)
    //         })
    //         .catch(error => console.log(error));

    //     })


    // }

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
    console.log(sessionStorage.getItem("endOfData"))
    if (
        window.scrollY + window.innerHeight >= document.body.offsetHeight  &&
        sessionStorage.getItem("isProcessing") != 'true' &&
        sessionStorage.getItem("endOfData") != 'true'

    ) {
        console.log(sessionStorage.getItem('isProcessing'))
        showSnackBar();
        sessionStorage.setItem("isProcessing", 'true');
        (async () => {
            setTimeout(async function () {
                student.updateTable(await student.fetchNext());
            }, 1000);
        })();
    }
});


