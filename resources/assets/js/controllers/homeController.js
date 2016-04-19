revyWeatherApp.controller('HomeController', ['$scope', '$http', function($scope, $http) {
    $scope.showCourthouse = false;
    $scope.showDowntown = false;
    $scope.showAirport = false;
    $scope.warnings = false;

    angular.element(document).ready(function() {
        var gc = new JustGage({
            id: "gauge-courthouse",
            value: 0,
            min: 0,
            max: 20,
            title: 'Wind',
            titleFontColor: '#cccccc',
            gaugeColor: '#f6f6f6',
            gaugeWidthScale: 0.5,
            label: 'km/h'
        });

        function getCurrent() {
            $http.get('api/v1/revelstoke.json').success(function(data) {
                $scope.courthouse = data;
                $scope.showCourthouse = true;

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

                    default:
                        degrees = 'N';
                        break;
                }

                $scope.arrowCourthouse = {
                    '-webkit-transform': 'rotate(' + degrees + 'deg)',
                    '-moz-transform': 'rotate(' + degrees + 'deg)',
                    '-o-transform': 'rotate(' + degrees + 'deg)',
                    '-ms-transform': 'rotate(' + degrees + 'deg)',
                    'transform': 'rotate(' + degrees + 'deg)'
                };
            });
        }

        setInterval(function() {
            $scope.$apply(function() {
                getCurrent();
            });
        }, 5000);
        getCurrent();

        var gd = new JustGage({
            id: "gauge-downtown",
            value: 0,
            min: 0,
            max: 20,
            title: 'Wind',
            titleFontColor: '#cccccc',
            gaugeColor: '#f6f6f6',
            gaugeWidthScale: 0.5,
            label: 'km/h'
        });

        $http.get('api/v1/forecastio-revelstoke.json').success(function(data) {
            $scope.forecastio = data;
            $scope.showDowntown = true;
            $scope.currentWeather = {
                forecast: {
                    icon: data.currently.icon,
                    iconSize: 80
                }
            };

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

        var ga = new JustGage({
            id: "gauge-airport",
            value: 0,
            min: 0,
            max: 20,
            title: 'Wind',
            titleFontColor: '#cccccc',
            gaugeColor: '#f6f6f6',
            gaugeWidthScale: 0.5,
            label: 'km/h'
        });

        $http.get('api/v1/ec-revelstoke.json').success(function(data) {
            $scope.airport = data;
            $scope.showAirport = true;

            if (data.warnings.event) {
                (data.warnings.event['@attributes'].type == "") ? $scope.warnings = false : $scope.warnings = true;

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

            var degrees = data.currentConditions.wind.bearing;

            $scope.arrowAirport = {
                '-webkit-transform': 'rotate(' + degrees + 'deg)',
                '-moz-transform': 'rotate(' + degrees + 'deg)',
                '-o-transform': 'rotate(' + degrees + 'deg)',
                '-ms-transform': 'rotate(' + degrees + 'deg)',
                'transform': 'rotate(' + degrees + 'deg)'
            };

            var windSpeed = data.currentConditions.wind.speed;
            ga.refresh(windSpeed);
        });
    });
}]);