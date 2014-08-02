'use strict';

var rightNowApp = angular.module('rightNowApp', [
    'angular-skycons'
]);

rightNowApp.controller('RightNowController', function($scope, $http) {

    $http.get('api/local.json').success(function(data) {
        $scope.courthouse = data;

        // gauges
        var gc = new JustGage({
            id: "gauge-courthouse",
            value: 0,
            min: 0,
            max: 20,
            title: "Wind km/h"
        });

        var windSpeed = data.speed * 1.60934;
        windSpeed = Math.ceil(windSpeed * 10) / 10;
        gc.refresh(windSpeed);

        var degrees = 0;
        switch (data.direction) {
            case "N":
                degrees = 0;
                break;
            case "NE":
                degrees = 45;
                break;
            case "E":
                degrees = 90;
                break;
            case "SE":
                degrees = 135;
                break;
            case "S":
                degrees = 180;
                break;
            case "SW":
                degrees = 225;
                break;
            case "W":
                degrees = 270;
                break;
            case "NW":
                degrees = 315;
                break;
        }

        $scope.arrowCourthouse = {
            '-webkit-transform': 'rotate(' + degrees + 'deg)',
            '-moz-transform': 'rotate(' + degrees + 'deg)',
            '-o-transform': 'rotate(' + degrees + 'deg)',
            '-ms-transform': 'rotate(' + degrees + 'deg)',
            'transform': 'rotate(' + degrees + 'deg)'
        };

        console.log(data);
    });

    $http.get('api/revelstoke.json').success(function(data){
        $scope.forecastio = data;

        $scope.currentWeather = {
            forecast: {
                icon: data.currently.icon,
                iconSize: 160
            }
        };

        var gd = new JustGage({
            id: "gauge-downtown",
            value: 0,
            min: 0,
            max: 20,
            title: "Wind km/h"
        });

        var windSpeed = data.currently.windSpeed;
        windSpeed = Math.ceil(windSpeed * 10) / 10;
        gd.refresh(windSpeed);

        var degrees = data.currently.windBearing;

        $scope.arrowDowntown = {
            '-webkit-transform': 'rotate(' + degrees + 'deg)',
            '-moz-transform': 'rotate(' + degrees + 'deg)',
            '-o-transform': 'rotate(' + degrees + 'deg)',
            '-ms-transform': 'rotate(' + degrees + 'deg)',
            'transform': 'rotate(' + degrees + 'deg)'
        };

        console.log(data);
    });

})
    .filter('windDirection', function() {
    return function(input) {
        var directions = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW', 'N'];
        return directions[Math.round(input/45)];
    }
});