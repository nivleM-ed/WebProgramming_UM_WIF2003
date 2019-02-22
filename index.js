// Set up our HTTP request
var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
var xhr = new XMLHttpRequest();
var API_KEY = "&appid=1afaa7bb7768fa072efe7edd746a72ae";
var API_URL = "https://api.openweathermap.org/data/2.5/weather?q=";
var CITY = "London";
var URL = API_URL.concat(CITY,API_KEY);

xhr.onload = function () {

    // Process our return data
    if (xhr.status >= 200 && xhr.status < 300) {
        console.log(xhr.responseText);
    } else {
        console.log('The request failed!');
    }
};

xhr.open('GET', URL);
xhr.send();