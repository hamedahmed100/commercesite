function activate(event) {
    var element = document.querySelector(".input");
    element.classList.add("active");
    event.preventDefault();
}
function deactivate(event) {
    var element = document.querySelector(".input");
    //element.value =''
    if (document.querySelector(".input").value == "") {
        element.value = "";
        element.classList.remove("active");
    }
    event.preventDefault();
}
class Student {
    bundleSize = 50;
    async intitTable() {
        await (() => {
            document.querySelector("table").innerHTML = "";
        })();
        sessionStorage.setItem("startIndex", 1);
        sessionStorage.setItem("totalCount", 0);
        sessionStorage.setItem("endOfData", "false");

        let data = await this.fetchNext();
        ////console.log(data)
        if (data.length > 0) {
            ////console.log(data[0]['total_count'])
            sessionStorage.setItem("totalCount", data[0]["total_count"]);
            let table = document.querySelector(".table");
            let thead = document.createElement("thead");
            let tr = document.createElement("tr");
            Object.entries(data[0])
                .slice()
                .reverse()
                .splice(1)
                .forEach(([key, value]) => {
                    let th = document.createElement("th");
                    th.innerText = key;
                    tr.appendChild(th);
                });

            thead.appendChild(tr);
            table.appendChild(thead);
            ////console.log(table)
        }
        // console.log("before update data ##########");
        // console.log(data);
        this.updateTable(data);
    }
    updateTable(data) {
        console.log(data.length);
        let table = document.querySelector("table");
        let tbody = document.createElement("tbody");
        if (data.length < 1 && document.querySelector(".input").value != "") {
            document.querySelector(".message span").innerText = "???? ???????? ???????????? ?????????? ??????????";
            document.querySelector(".message span").classList.add("activ");
        } else {
            document.querySelector(".message span").classList.remove("activ");
        }
        data.forEach(element => {
            let tr = document.createElement("tr");
            Object.entries(element)
                .slice()
                .reverse()
                .splice(1)
                .forEach(([key, value]) => {
                    let td = document.createElement("td");
                    td.innerText = value;
                    tr.appendChild(td);
                });
            tbody.appendChild(tr);
        });
        //console.log(document.getElementsByTagName('tr').length-1)
        if (document.getElementsByTagName("tr").length - 1 >= parseInt(sessionStorage.getItem("totalCount"))) {
            sessionStorage.setItem("endOfData", "true");
        }
        table.appendChild(tbody);
        hideSnackBar();
    }

    async fetchNext() {
        let data = [];
        //console.log(parseInt(sessionStorage.getItem('startIndex')));
        //console.log(parseInt(sessionStorage.getItem('startIndex')) + this.bundleSize);
        let bodyString =
            "startIndex=" +
            parseInt(sessionStorage.getItem("startIndex")) +
            "&lastIndex=" +
            (parseInt(sessionStorage.getItem("startIndex")) + this.bundleSize);
        if (document.querySelector(".input").value != "") bodyString += `&queryString=${document.querySelector(".input").value}`;

        await fetch("api/student/student.php", {
            method: "Post",
            body: bodyString,
            // {
            //     "startIndex": 20,
            //     "lastIndex": 40

            // },
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                Accept: "json",
            },
        })
            .then(response => {
                // console.log(response);
                if (response.status == 200) {
                    return response.json();
                }
            })
            .then(res => {
                data = res;
                //console.log(res)
            })
            .catch(error => {
                ////console.log(error)
            });

        sessionStorage.setItem("startIndex", parseInt(sessionStorage.getItem("startIndex")) + this.bundleSize + 1);
        return data;
    }

    loadJSON() {
        return new Promise(function (resolve, reject) {
            fetch("sample.json")
                .then(response => response.json())
                .then(data => {
                    resolve(data);
                })
                .catch(error => reject(error));
        });
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
    sessionStorage.setItem("isProcessing", "false");
}

let student = new Student();
student.intitTable();
sessionStorage.setItem("isProcessing", "false");

window.addEventListener("scroll", () => {
    ////console.log(sessionStorage.getItem("endOfData"))
    if (
        window.scrollY + window.innerHeight >= document.body.offsetHeight &&
        sessionStorage.getItem("isProcessing") != "true" &&
        sessionStorage.getItem("endOfData") != "true"
    ) {
        ////console.log(sessionStorage.getItem('isProcessing'))
        showSnackBar();
        sessionStorage.setItem("isProcessing", "true");
        (async () => {
            setTimeout(async function () {
                student.updateTable(await student.fetchNext());
            }, 1000);
        })();
    }
});
sessionStorage.setItem("searchProcessing", "false");
var regex = new RegExp("^[\u0621-\u064A0-9a-zA-Z ]*$");
document.querySelector(".input").addEventListener("input", async event => {
    if (regex.test(document.querySelector(".input").value)) {
        if (sessionStorage.getItem("searchProcessing") == "false") {
            sessionStorage.setItem("searchProcessing", "true");
            setTimeout(async () => {
                let element = document.querySelector(".message span").classList.remove("activ");
                sessionStorage.setItem("startIndex", 1);
                sessionStorage.setItem("totalCount", 0);
                sessionStorage.setItem("endOfData", "false");
                console.log(document.querySelector(".table").innerHTML);
                await (() => {
                    document.querySelector("table").innerHTML = "";
                })();
                console.log(document.querySelector("table").innerHTML);

                let student = new Student();
                await student.intitTable();
                sessionStorage.setItem("isProcessing", "false");
                sessionStorage.setItem("searchProcessing", "false");
            }, 1000);
        }
    } else {
        document.querySelector(".message span").innerText = "?????????? ?????? ?????????????? ?????????????? ?????????????? ??????????????????????";
        var element = document.querySelector(".message span").classList.add("activ");
    }
});

function exportTableToExcel(tableID, filename = "") {
    var downloadLink;
    var dataType = "application/vnd.ms-excel";
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");

    // Specify file name
    filename = filename ? filename + ".xls" : "Students.xls";

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(["\ufeff", tableHTML], {
            type: dataType,
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = "data:" + dataType + ", " + tableHTML;
        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
