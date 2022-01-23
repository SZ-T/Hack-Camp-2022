class LazyLoad {
    
    constructor(url, type, xValues, chart, legend){
        this.isRunning = false;
        this.page = 1;
        this.url = url;
        this.type = type;
        this.xValues = xValues;
        this.chart = chart;
        this.legend = legend;
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
            xhr.send('&page=' + this.page);
            this.page += 1;
        }
    }

    processResponse(response){
        if (this.chart){
            let data = response.split("%&&%");
            if (data[3] == ""){
                document.getElementById("end").classList.remove("d-none");
            } else {
                this.insertResponse(data[3]);
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

    makeCharts(ids_json, data1_json, data2_json){
        let ids = JSON.parse(ids_json);
        let data1 = JSON.parse(data1_json);
        let data2 = JSON.parse(data2_json);
        for (let i = 0; i < ids.length; i++) {
            makeChart('myChart' + ids[i], this.type, [data1[i], data2[i]], this.xValues, this.legend);
        }
    }
}