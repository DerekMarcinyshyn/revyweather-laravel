'use strict';

var rightNowApp = angular.module('rightNowApp', [
    'angular-skycons'
]);

rightNowApp.controller('RightNowController', function($scope, $http) {

    $http.get('api/local.json').success(function(data) {
        $scope.courthouse = data;
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