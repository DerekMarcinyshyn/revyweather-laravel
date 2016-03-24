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

        if (data.warnings.event) {
            (data.warnings.event['@attributes'].type == "") ? $scope.airport.warnings = false : $scope.airport.warnings = true;

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
    });
});

revyWeatherApp.filter('ecDirection', function() {
    return function(input) {
        if (input == "" || input == undefined)
            return '';
        else
            return input;
    }
});

