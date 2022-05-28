(async () => {
    await fetch("/api/student/stages.php", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'Accept': 'json'
        }
    }).then((response) => {

        if (response.status == 200) {
            return response.json()
        }

    }).then((res) => {
        data = res
        console.log(res)
        data.forEach(element => {
            document.querySelector("#stage").innerHTML += `<option value="${element.id}">${element.name}</option>`;

        });

    }).catch((error) => {
        ////console.log(error)
    })
})();

document.querySelector("#stage").addEventListener('change', () => {
    console.log('called');
    try {
        fetch("/api/student/groups.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'json'
            },
            body: `stageId=${document.querySelector("#stage").value}`
        }).then((response) => {

            if (response.status == 200) {
                return response.json()
            }

        }).then((res) => {
            data = res
            console.log(res)
            data.forEach(element => {
                document.querySelector("#group").innerHTML += `<option value="${element.id}">${element.name}</option>`;
            });

        }).catch((error) => {
            ////console.log(error)
        })
    } catch (error) {
        console.log(error);
    }

})