'use strict';

var rightNowApp = angular.module('rightNowApp', [
    'angular-skycons'
]);

rightNowApp.controller('RightNowController', function($scope, $http) {

    // TODO: create command that grabs the json every 10 seconds
    // TODO: and stores it in the public/data folder

    // TODO: grab the latest image every 5 minutes as well

    // TODO: create forecast.io account
    // TODO: import skycons

    // TODO: try to keep the data thin here
    // TODO: eg. $scope.courthouse = data;
    // TODO: and move the logic into the view

    $http.get('http://192.168.1.34/weather-station/data.php')
        .success(function(data) {

            $scope.courthouseTimestamp = data.timestamp;
            $scope.courthousePressure = data.barometer + 'kPa';
            $scope.courthouseHumidity = data.relativehumidity + '%';
            $scope.courthouseWind = data.direction + ' ' + data.speed + 'km/h';

            console.log(data);
        });


    $http.get('api/revelstoke.json').success(function(data){
        $scope.forecastio = data;

        $scope.currentWeather = {
            forecast: {
                icon: data.currently.icon,
                iconSize: 120
            }
        };

        console.log(data);
    });

});