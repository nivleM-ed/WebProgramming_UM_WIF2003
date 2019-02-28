
//to be uncommented to use in vscode
// var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
var xhr = new XMLHttpRequest();
var API_KEY = "&appid=1afaa7bb7768fa072efe7edd746a72ae";
// var API_URL = "https://api.openweathermap.org/data/2.5/weather?q=";
var API_URL = "https://api.openweathermap.org/data/2.5/forecast?q=";
var CITY = document.getElementById("city").value;
// var CITY = "Malaysia";
var URL = API_URL.concat(CITY,API_KEY);
var response, myRes;
var dateArr = new Array();
var weatherArr = new Array();
var speedArr = new Array();

function getWeather() {
        xhr.onload = function () {

        // Process our return data
        if (xhr.status >= 200 && xhr.status < 300) {
            response = xhr.responseText;
            myRes = JSON.parse(response);
            console.log(myRes);
            // document.getElementById("response").innerHTML = myRes.city.name;
            console.log(document.getElementById("city").value);
            getDataArr();
            getChart();
        } else {
            console.log(CITY);
            console.log(document.getElementById("city").value);
            console.log('The request failed!');
        }
    };
    
    xhr.open('GET', URL);
    xhr.send();   
}

function getDataArr() {
    for(var i=0; i<myRes.list.length; i++) {
        weatherArr[i] = myRes.list[i].weather[0].description;
        // console.log(weatherArr[i]);
    }

    for(var i=0; i<myRes.list.length; i++) {
        dateArr[i] = myRes.list[i].dt_txt;
        // console.log(dateArr[i]);
    }

    for(var i=0; i<myRes.list.length; i++) {
        speedArr[i] = myRes.list[i].wind.speed;
        // console.log(speedArr[i]);
    }
}

function getChart() {
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dateArr,
        datasets: [{
            label: 'Wind speed chart',
            data: speedArr,
            backgroundColor: "red",
            borderColor: "red",
            fill: false,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
}






