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

function hideCard() {
    document.getElementById("cardView").classList.toggle("hide-filters");
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

function liveSearch(type, data, self) {
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

function cardView(action, id) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "/cardViewTest.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        document.getElementById("full").innerHTML = xhr.response;
    };
    xhr.onerror = function() {
        alert("Request failed");
    };
    xhr.send("action=" + action + "&id=" + id);
}

function miniCard(source, mode, id) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "/miniTile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        document.getElementById(id).innerHTML = xhr.response;
    };
    xhr.onerror = function() {
        alert("Request failed");
    };
    xhr.send("source=" + source + "&id=" + id + "&mode=" + mode );
}

function miniCardEdit(source, mode, id) {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', "/miniTile.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
        document.getElementById(id).innerHTML = xhr.response;
    };
    xhr.onerror = function() {
        alert("Request failed");
    };
        att1 = document.getElementById("att1").value;
        att2 = document.getElementById("att2").value;
        att3 = document.getElementById("att3").value;
        att4 = document.getElementById("att4").value;
    xhr.send("source=" + source + "&id=" + id + "&mode=" + mode + "&edit=edit" + "&att1=" + att1 + "&att2=" + att2 + "&att3=" + att3 + "&att4=" + att4);
}

function clearSuggestions (type){
    document.getElementById(type + 'List').innerHTML = "";
}

function makeChart(id, type, yValues, xValues, legend=true){

    var barColors = [
    "#b91d47",
    "#00aba9"
    ];

    new Chart(id, {
    type: type,
    data: {
    labels: xValues,
    datasets: [{
    backgroundColor: barColors,
    data: yValues
    }]
    },
    options: {
        responsive: true,
        legend: {display: legend, labels: {
            fontColor: 'white'
           }},
    }
    });
}

function makeChartB(id, type, A, B, x1, x2, legend=true){

    var YvalueA = A;
    var YvalueB = B;
    var xValues = [x1, x2];
    var yValues = [YvalueA, YvalueB];

    var barColors = [
    "#b91d47",
    "#00aba9"
    ];

    new Chart(id, {
    type: type,
    data: {
    labels: xValues,
    datasets: [{
    backgroundColor: barColors,
    data: yValues
    }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {                    
                    fontColor: 'white'
                },
            }],
          xAxes: [{
                ticks: {
                    fontColor: 'white'
                },
            }]
        },
        responsive: true,
        legend: {display: legend, labels: {
            fontColor: 'white'
           }},
    }
    });
}

function indexChartA(){
    

    var xValues = [Xvalue1, Xvalue2, Xvalue3, Xvalue4, Xvalue5];
    var yValues = [Yvalue1, Yvalue2, Yvalue3, Yvalue4, Yvalue5];
    //var yValues = [80,55];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#244CEB",
      "#DB0C02",
      "#F58E20"
    ];

    var chart = new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues

        }]
      },
      options: {
        onClick(e) {
        var activePoints = chart.getElementsAtEvent(e);
        var selectedIndex = activePoints[0]._index; 
        alert(chart.data.labels[selectedIndex]);
        //console.log(chart.data.labels[selectedIndex]);    
        },
        responsive: true,
        legend: {
          display: false,
       },
       scales: {
          yAxes: [{ticks: {
                  fontColor: 'white'
              },
            scaleLabel: {
              display: true,
              labelString: 'Game',
              fontColor: 'white'
            }
          }],
          xAxes: [{
            ticks: {
                  fontColor: 'white'
              },
            scaleLabel: {
              display: true,
              labelString: 'Genre',
              fontColor: 'white'
            }
          }]
        }
      }
    });
}

function arrow(arrow) {
    if (document.getElementById(arrow).classList.contains("bi-arrow-down")) {
        document.getElementById(arrow).classList.toggle("bi-arrow-up");
        document.getElementById(arrow).classList.remove("bi-arrow-down");
    }
    else {
        document.getElementById(arrow).classList.toggle("bi-arrow-down");
        document.getElementById(arrow).classList.remove("bi-arrow-up");
    } 
}

$(document).on("keydown", "form", function(event) { 
    return event.key != "Enter";
});

var selected = [];

function select(id) {
    if (!selected.length == 0){
        if (selected.includes(id)){
            let index = selected.indexOf(id);
            selected.splice(index, 1)
            document.getElementById(id).classList.toggle("hover-bg");
            document.getElementById(id).classList.remove("hover-bg-selected");
        } else {
            selected.push(id);
            document.getElementById(id).classList.toggle("hover-bg-selected");
            document.getElementById(id).classList.remove("hover-bg");
            }
        } else {
        selected.push(id);
            document.getElementById(id).classList.toggle("hover-bg-selected");
            document.getElementById(id).classList.remove("hover-bg");
        }
    }


    function destroy() {
        selected = [];
    }

    function selectAll() {
        let ids = JSON.parse(IDs);
        for (let i = 0; i < ids.length; i++) {
            select(ids[i]);
        }
    }

    function editSelected() {

    }


    
    


