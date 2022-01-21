class LazyLoad {
    
    constructor(url, type, xValues){
        this.isRunning = false;
        this.page = 1;
        this.url = url;
        this.type = type;
        this.xValues = xValues;
        this.loadResults();
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                load.loadResults();
            }
        };
    }
    
    loadResults() {
        if (!this.isRunning){
            this.isRunning = true;
            document.getElementById("loading").classList.remove("d-none");
            let xhr = new XMLHttpRequest();
            xhr.open('POST', this.url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                load.processResponse(xhr.responseText);
            };
            xhr.onerror = function() {
                alert("Request failed");s
                this.isRunning = false;
            };
            var data = document.getElementById("searchText").value;
            xhr.send("searchText=" + data + "&page=" + this.page);
            this.page += 1;
        }
    }

    processResponse(response){
        let data = response.split("|");
        if (data[3] == ""){
            document.getElementById("end").classList.remove("d-none");
        } else {
            let body = document.getElementById("tiles");
            let newDiv = document.createElement("DIV");
            newDiv.classList.add("row");
            newDiv.classList.add("m-0");
            newDiv.classList.add("col-md-12");
            body.appendChild(newDiv);
            newDiv.innerHTML += data[3];
            document.getElementById("loading").classList.add("d-none");
            let ids = JSON.parse(data[0]);
            let sold = JSON.parse(data[1]);
            let avail = JSON.parse(data[2]);
            for (let i = 0; i < ids.length; i++) {
                makeChart('myChart' + ids[i], this.type, [sold[i], avail[i]], this.xValues);
            }
            this.isRunning = false;
        }
    }
}