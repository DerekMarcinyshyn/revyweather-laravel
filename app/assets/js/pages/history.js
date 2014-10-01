$(function() {

    var chart;

    Highcharts.setOptions({
        global: {
            useUTC: false
        }
    });

    if ($('#history-chart').length) {
        var options = {
            chart: {
                renderTo:           'history-chart',
                backgroundColor:    '#eeeeee',
                zoomType:           'x'
            },

            title: {
                text:               'Courthouse Weather History'
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
                    format: '{value} °C'
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
                    format: '{value} kPa'
                },
                title: {
                    text: 'Barometer',
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
                    format: '{value} %'
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
                    format: '{value} km/h'
                },
                title: {
                    text: 'Wind Speed',
                    style: {
                        color: '#999999'
                    }
                },
                opposite: true
            }],

            legend: {
                layout:             'vertical',
                align:              'left',
                verticalAlign:      'top',
                x:                  180,
                y:                  2,
                borderWidth:        1,
                floating:           true,
                backgroundColor:    '#E6E6E6',
                borderColor:        '#DDDDDD',
                borderRadius:       0
            },

            credits: {
                href:   '',
                text:   ''
            },

            series: []
        };

        // get the last week data
        var lastWeek = moment().subtract(6, 'days');
        var rightNow = moment();

        // initial load of data for high charts
        $.ajax({
            url: '/api/history/' + lastWeek.format('YYYY-MM-DD HH:mm:ss') + '/' + rightNow.format('YYYY-MM-DD HH:mm:ss'),
            dataType: 'json',
            type: 'GET'
        }).success(function(data) {
            options.series = data;
            var chart = new Highcharts.Chart(options);
        });



        // setup the date picker
        $('#history-dates').daterangepicker({
                format: 'YYYY-MM-DD',
                minDate: '2013-08-25 02:00:00',
                maxDate: moment(),
                timePicker: true,
                ranges: {
                    'Last 24 hours:': [moment().subtract(1, 'days'), moment()],
                    'Last 7 days:': [moment().subtract(6, 'days'), moment()],
                    'Last 30 days:': [moment().subtract(29, 'days'), moment()]
                },
                startDate: '2013-08-25 01:00:00',
                endDate: moment()
            },
            function(start, end) {
                //console.log(start.format('YYYY-MM-DD HH:mm:ss') + ' to ' + end.format('YYYY-MM-DD HH:mm:ss'));
                $.ajax({
                    url: '/api/history/' + start.format('YYYY-MM-DD HH:mm:ss') + '/' + end.format('YYYY-MM-DD HH:mm:ss'),
                    dataType: 'json',
                    type: 'GET'
                }).success(function(data) {
                    //console.log(data);
                    options.series = data;
                    var chart = new Highcharts.Chart(options);
                });
            }

        );
    }

});