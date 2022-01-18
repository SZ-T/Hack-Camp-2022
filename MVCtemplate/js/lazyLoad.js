class LazyLoad {
    
    
    constructor(){
        LazyLoad.loadResults()
    }
    
    static page = 1;
    static loadResults() {
        document.getElementById("loading").classList.remove("d-none");
        let xhr = new XMLHttpRequest();
        xhr.open('POST', "/lazySearchData.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.response == ""){
                document.getElementById("end").classList.remove("d-none");
            } else {
                document.getElementById("tiles").innerHTML += xhr.response;
            }
            document.getElementById("loading").classList.add("d-none");
        };
        xhr.onerror = function() {
            alert("Request failed");
        };
        var data = document.getElementById("searchText").value;
        xhr.send("searchText=" + data + "&page=" + this.page);
        this.page += 1;
    }
}
document.getElementById('tiles').addEventListener("load", new LazyLoad());

window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        new LazyLoad();
    }
};