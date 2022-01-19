var prev_ids = [];
var prev_sold = [];
var prev_avail = [];

class LazyLoad {
    
    static url;
    static isRunning = false;
    static page = 1;

    static init(url){
        this.url = url;
    }
    
    static loadResults() {
        if (!this.isRunning){
            this.isRunning = true;
            document.getElementById("loading").classList.remove("d-none");
            let xhr = new XMLHttpRequest();
            xhr.open('POST', this.url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                LazyLoad.processResponse(xhr.responseText);
            };
            xhr.onerror = function() {
                alert("Request failed");
                this.isRunning = false;
            };
            var data = document.getElementById("searchText").value;
            xhr.send("searchText=" + data + "&page=" + this.page);
            this.page += 1;
        }
    }

    static processResponse(response){
        let data = response.split("|");
        if (data[3] == ""){
            document.getElementById("end").classList.remove("d-none");
        } else {
            document.getElementById("tiles").innerHTML += data[3];
            document.getElementById("loading").classList.add("d-none");
            for (let i = 0; i < prev_ids.length; i++) {
                makeChartQuick('myChart' + prev_ids[i], 'doughnut', prev_sold[i], prev_avail[i], 'Units Sold', 'Units Available');
            }
            let ids = JSON.parse(data[0]);
            let sold = JSON.parse(data[1]);
            let avail = JSON.parse(data[2]);
            for (let i = 0; i < ids.length; i++) {
                makeChart('myChart' + ids[i], 'doughnut', sold[i], avail[i], 'Units Sold', 'Units Available');
                document.addEventListener('scroll', function () {
                    let canvas = document.getElementById('myChart' + ids[i]);
                    if (isInView(canvas) && isCanvasBlank(canvas)){
                        makeChartQuick('myChart' + ids[i], 'doughnut', sold[i], avail[i], 'Units Sold', 'Units Available');
                    }
                });
                prev_ids = ids;
                prev_sold = sold;
                prev_avail = avail;
            }
            this.isRunning = false;
        }
    }
}

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        LazyLoad.loadResults();
    }
};