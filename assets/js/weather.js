var xhr = new XMLHttpRequest();
var response, myRes;
var dateArr = new Array();
var skyArr = new Array();
var weatherArr = new Array();
var weatherArrSky = new Array();
var weatherArrTemp = new Array();
var tempArr = new Array();

//to get data(city) from user and get api json file 
function getWeatherData(CITY) {
    var API_KEY = "&appid=1afaa7bb7768fa072efe7edd746a72ae";
    var API_URL = "https://api.openweathermap.org/data/2.5/forecast?q=";
    var CITY;
    var URL = API_URL.concat(CITY, API_KEY);
    getWeather(URL);
}

function getWeather(URL) {
    xhr.onload = function () {

        // Process our return data
        if (xhr.status >= 200 && xhr.status < 300) {
            response = xhr.responseText;
            myRes = JSON.parse(response);
            console.log(myRes);
            // console.log(document.getElementById("city").value);  
            getDataArr();
            getChart();
            setSky();
        } else {
            // console.log(document.getElementById("c   ity").value);
            console.log('The request failed!');
        }
    };

    xhr.open('GET', URL);
    xhr.send();
}

function dashToSlash(string){
    var response = string.replace(/-/g,"/");
    //The slash-g bit says: do this more than once
    return response;
  }

function setSky() {
    for(var i=0; i<weatherArrSky.length; i++) {
        $("#dates").append('<td>'+weatherArr[i]+'</td>');
        $("#weather").append('<td>'+weatherArrSky[i]+'</td>');
        $("#temperature").append('<td>'+parseInt(weatherArrTemp[i])+'</td>');
    }
    
}

//change the response file from api endpoint to array
//weatherArr - list of weather descriptions on the respective date
//dateArr - date of the weather
//speedArr - speed of wind on the respective date
function getDataArr() {

    for (var i = 0; i < myRes.list.length; i++) {
        dateArr[i] = myRes.list[i].dt_txt.substring(0, 11);
    }

    for (var i = 0; i < myRes.list.length; i++) {
        tempArr[i] = parseInt(myRes.list[i].main.temp) - 273.15;
    }

    for (var i = 0; i < myRes.list.length; i++) {
        skyArr[i] = myRes.list[i].weather[0].main;
    }

    for (var i = 0; i < dateArr.length; i++) {
        if (weatherArr.includes(dateArr[i])) {
            // console.log(dateArr[i]);
        } else {
            weatherArr.push(dateArr[i]);
            weatherArrTemp.push(tempArr[i]);
            weatherArrSky.push(skyArr[i]);
        }
    }
    $.ajax({
        url: "add_weather.php",
        type: "post",
        datatype: "json",
        data:  {date:dateArr, temp:weatherArrTemp, weather:skyArr},
        success: function(data) {
            console.log(data);
        }
    });
}

//taken from chart.js
//show a chart of date to temperature
function getChart() {
    var ctx = document.getElementById("myChart").getContext('2d');
    document.getElementById("myChart").setAttribute("style", "border-style: solid");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: weatherArr,
            datasets: [{
                label: 'Temperature chart',
                data: weatherArrTemp,
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
                        beginAtZero: true,
                        scaleOverride: true,
                        scaleSteps: 2,
                        scaleStepWidth: 50,
                        scaleStartValue: 0
                    },
                    gridLines: {
                        // display: false ,
                        // color: "#FFFFFF"
                      }
                }],
                xAxes: [{
                    gridLines: {
                        // display: false ,
                        // color: "#FFFFFF"
                      }
                }]
            }
        }
    });
}

function getTemp(){
    return weatherArrTemp;
}

function getDate(){
    return dateArr;
}    