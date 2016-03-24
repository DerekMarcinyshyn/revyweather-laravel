/**
 * RevyWeather
 * @author  Derek Marcinyshyn
 */

var revyWeatherApp = angular.module('RevyWeatherApp', ['ngMaterial']);

revyWeatherApp.controller('NavController', function($scope, $mdSidenav) {
    $scope.openSidenav = function() {
        $mdSidenav('left').open();
    };
    $scope.closeSidenav = function() {
        $mdSidenav('left').close();
    };
    $scope.goto = function(page) {
        $mdSidenav('left').close();
        window.location = page;
    };
});

revyWeatherApp.controller('HomeController', function($scope, $http) {
    $http.get('api/v1/ec-revelstoke.json').success(function(data) {
        $scope.airport = data;
    });
});

