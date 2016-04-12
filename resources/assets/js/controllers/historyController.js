revyWeatherApp.controller('HistoryController', function($scope, $http, $timeout, highchartsNG) {
    highchartsNG.ready(function() {
        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });
        $scope.chartConfig = {
            chart: {
                zoomType:           'x'
            },
            title: {
                text: '7 Day History'
            },
            xAxis: {
                type:               'datetime',
                dateTimeLabelFormat: { hour: '%m %d %H:%M'},
                tickPixelInterval:  150,
                minRange:           1
            },
            yAxis: [{
                gridLineWidth: 1,
                labels: {
                    style: {
                        color: '#B26969'
                    },
                    format: '{value}°C'
                },
                title: {
                    text: 'Air Temp',
                    style: {
                        color: '#B26969'
                    }
                }
            }, {
                gridLineWidth: 0,
                labels: {
                    style: {
                        color: '#3B54FF'
                    },
                    format: '{value}'
                },
                title: {
                    text: 'Barometer kPa',
                    style: {
                        color: '#3B54FF'
                    }
                },
                opposite: false
            }, {
                gridLineWidth: 0,
                labels: {
                    style: {
                        color: '#88E8A9'
                    },
                    format: '{value}%'
                },
                title: {
                    text: 'Relative Humidity',
                    style: {
                        color: '#88E8A9'
                    }
                },
                opposite: true
            }, {
                gridLineWidth: 0,
                labels: {
                    style: {
                        color: '#999999'
                    },
                    format: '{value}'
                },
                title: {
                    text: 'Wind Speed km/h',
                    style: {
                        color: '#999999'
                    }
                },
                opposite: true
            }],
            credits: {
                href:   '',
                text:   ''
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            loading: true,
            series: [],
            size: {
                height: '720'
            }
        };

        // get the last week data
        var from = encodeURIComponent(moment().subtract(6, 'days').format('YYYY-MM-DD HH:mm:ss'));
        var to = encodeURIComponent(moment().add(1, 'days').format('YYYY-MM-DD HH:mm:ss'));
        var url = 'api/v1/history?from='+from+'&to='+to;

        $http.get(url).success(function(data) {
            $scope.chartConfig.loading = false;
            if (data != 'false') {
                $scope.chartConfig.series = data;
            }
            $scope.$broadcast('highchartsng.reflow');
        });
    });
});