
//to be uncommented to use in vscode
// var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
var xhr = new XMLHttpRequest();
var API_KEY = "&appid=1afaa7bb7768fa072efe7edd746a72ae";
var API_URL = "https://api.openweathermap.org/data/2.5/weather?q=";
var CITY = "London";
var URL = API_URL.concat(CITY,API_KEY);
var response;

run();

function run() {
    xhr.onload = function () {

        // Process our return data
        if (xhr.status >= 200 && xhr.status < 300) {
            response = xhr.responseText;
            console.log(response);
        } else {
            console.log('The request failed!');
        }
    };
    
    xhr.open('GET', URL);
    xhr.send();
    
    //delete to run in vs code
    var myRes = JSON.parse(response);
    document.getElementById("coordinate").innerHTML = myRes.coord.lon;
}




