class LazyLoad {
    
    constructor(url, type, xValues, chart){
        this.isRunning = false;
        this.page = 1;
        this.url = url;
        this.type = type;
        this.xValues = xValues;
        this.chart = chart;
        this.loadResults();
        window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                load.loadResults();
            }
        };
    }
    
    loadResults() {
        if (!this.isRunning){
            console.log(this.url);
            console.log(this.url + this.page);
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
            xhr.send(this.url + this.page);
            this.page += 1;
        }
    }

    processResponse(response){
        if (this.chart){
            let data = response.split("|");
            if (data[3] == ""){
                document.getElementById("end").classList.remove("d-none");
            } else {
                this.insertResponse(response);
                this.makeCharts(data[0], data[1], data[2])
            }
        } else {
            if (response == ""){
                document.getElementById("end").classList.remove("d-none");
            } else {
                this.insertResponse(response);
            }
        }
        this.isRunning = false;
    }
    
    insertResponse(content){
        let body = document.getElementById("tiles");
        let newDiv = document.createElement("DIV");
        newDiv.classList.add("row");
        newDiv.classList.add("m-0");
        newDiv.classList.add("col-md-12");
        body.appendChild(newDiv);
        newDiv.innerHTML += content;
        document.getElementById("loading").classList.add("d-none");
    }

    makeCharts(data1, data2, data3){
        let ids = JSON.parse(data1);
        let sold = JSON.parse(data2);
        let avail = JSON.parse(data3);
        for (let i = 0; i < ids.length; i++) {
            makeChart('myChart' + ids[i], this.type, [sold[i], avail[i]], this.xValues);
        }
    }
}