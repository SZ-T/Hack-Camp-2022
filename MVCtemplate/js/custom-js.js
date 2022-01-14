function slideIn() {
    document.getElementById("slider").classList.toggle("show");
    document.getElementById("slider").classList.remove("hide");
    if (document.getElementById("slider").classList.contains("marginOut")) {
        document.getElementById("slider").classList.toggle("marginOut");
    }
}

function slideOut() {
    document.getElementById("slider").classList.toggle("marginOut");
    document.getElementById("slider").classList.remove("show");
}

function toggleFiltersMenu() {
    document.getElementById("filters").classList.toggle("hide-filters");
    document.getElementById("filters").classList.toggle("show-filters");
}

function toggleFilter(filter) {
    if (document.getElementById(filter).classList.contains("hide-slide")) {
        document.getElementById(filter).classList.toggle("slide-down");
        document.getElementById(filter).classList.remove("hide-slide");
    }
    else {
        document.getElementById(filter).classList.toggle("hide-slide");
        document.getElementById(filter).classList.remove("slide-down");
    } 
}

function send(type, data, self) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "/liveSearch.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        document.getElementById(type.toLowerCase() + 'List').innerHTML = xhr.response;
    };
    xhr.onerror = function() {
        alert("Request failed");
    };
    xhr.send("type=" + type + "&data=" + data);
}

function cardView(id) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "/CardView.php", true);
}