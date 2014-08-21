'use strict';

var rightNowApp = angular.module('rightNowApp', [
    'angular-skycons',
    'ui.bootstrap'
]);

rightNowApp.controller('RightNowController', function($scope, $http, $interval) {
    /**
     * Local current weather
     */

    var gc = new JustGage({
        id: "gauge-courthouse",
        value: 0,
        min: 0,
        max: 20,
        title: "Wind km/h"
    });


    function getCurrent() {
        $http.get('api/local.json').success(function(data) {
            $scope.courthouse = data;

            var windSpeed = data.speed * 1.60934;
            $scope.windSpeed = Math.ceil(windSpeed * 10) / 10;
            gc.refresh($scope.windSpeed);

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
//
//            console.log(data);
        });
    }

//    setInterval(function() {
//        $scope.$apply(function() {
//           getCurrent();
//        });
//    }, 5000);
    getCurrent();


    /**
     * Forecast.io
     */

    var gd = new JustGage({
        id: "gauge-downtown",
        value: 0,
        min: 0,
        max: 20,
        title: "Wind km/h"
    });

    $scope.isForecastCollapsed = true;

    $http.get('api/revelstoke.json').success(function(data){
        $scope.forecastio = data;

        $scope.currentWeather = {
            forecast: {
                icon: data.currently.icon,
                iconSize: 80
            }
        };

        console.log(data);

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
    });

    /**
     * Environment Canada
     */
    var ga = new JustGage({
        id: "gauge-airport",
        value: 0,
        min: 0,
        max: 20,
        title: "Wind km/h"
    });

    $http.get('api/revelstoke-ec.json').success(function(data) {
        $scope.airport = data;

        var windSpeed = data.currentConditions.wind.speed;
        ga.refresh(windSpeed);

        var degrees = data.currentConditions.wind.bearing;

        $scope.arrowAirport = {
            '-webkit-transform': 'rotate(' + degrees + 'deg)',
            '-moz-transform': 'rotate(' + degrees + 'deg)',
            '-o-transform': 'rotate(' + degrees + 'deg)',
            '-ms-transform': 'rotate(' + degrees + 'deg)',
            'transform': 'rotate(' + degrees + 'deg)'
        };

        if (data.warnings.event) {
            switch (data.warnings.event['@attributes'].type) {
                case 'watch':
                    $scope.alertClass = 'alert-danger';
                    break;

                case 'advisory':
                    $scope.alertClass = 'alert-warning';
                    break;

                case 'warning':
                    $scope.alertClass = 'alert-warning';
                    break;

                case 'ended':
                    $scope.alertClass = 'alert-success';
                    break;

                case 'statement':
                    $scope.alertClass = 'alert-info';
                    break;

                default:
                    $scope.alertClass = 'alert-info';
                    break;
            }
        }

        console.log(data);
    });




});

rightNowApp.filter('climacons', function() {
    return function(input) {
        return input.replace(/-/g, " ");
    }
});

rightNowApp.filter('windDirection', function() {
    return function(input) {
        var directions = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW', 'N'];
        return directions[Math.round(input/45)];
    }
});

rightNowApp.filter('ecDirection', function() {
    return function(input) {
        if (input == "" || input == undefined)
            return '';
        else
            return input;
    }
});
