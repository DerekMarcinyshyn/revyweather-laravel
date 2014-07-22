'use strict';

var rightNowApp = angular.module('rightNowApp', []);

rightNowApp.controller('RightNowController', function($scope, $http) {
    $http.get('http://192.168.1.34/weather-station/data.php')
        .success(function($data) {

            $scope.courthouseTimestamp = $data.timestamp;
            console.log($data);
        });
});