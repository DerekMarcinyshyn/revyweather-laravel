revyWeatherApp.controller('NavController', function($scope, $mdSidenav) {
    $scope.openSidenav = function() {
        $mdSidenav('left').open();
    };
    $scope.closeSidenav = function() {
        $mdSidenav('left').close();
    };
    $scope.goto = function(page) {
        $mdSidenav('left')
            .close()
            .then(function() {
                window.location = page;
            });
    };
});