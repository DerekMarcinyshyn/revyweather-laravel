jQuery(document).ready(function($) {

    var timelapseMonthPrevious;
    var timelapseMonthNext;
    var timelapseYearPrevious;
    var timelapseYearNext;
    var rightnow = moment();

    // Timelapse video Calendar
    function getCalendar(year, month) {
        $('#timelapse-calendar').hide();
        $('#timelapse-loader').show();

        $.post('/api/get-timelapse-calendar-dates', {year: year, month: month}, function(data) {
            $('#timelapse-loader').hide();
            $('#timelapse-calendar').html(data.data).fadeIn(250);

            // Video player
            $('.timelapse-start-video').click(function() {
                var target = $(this).attr('rel');
                var path = 'http://video.revyweather.com/';
                var videoPlayer = videojs('timelapse-video');
                var dates = target.split('/');

                $('#timelapse-video-title').html(dates[1] + ' ' + dates[2] + ', ' + dates[0]);

                videoPlayer.ready(function() {
                    var timelapsePlayer = this;

                    timelapsePlayer.pause();
                    $('video').attr('src', path + target + '.webm');
                    $('video source:nth-child(1)').attr('src', path + target + '.webm');
                    $('video source:nth-child(2)').attr('src', path + target + '.mp4');
                    $('.vjs-big-play-button').show();
                    $('#timelapse-video').removeClass('vjs-playing').addClass('vjs-pause');
                    timelapsePlayer.load();
                    $('#timelapse-video_html5_api').show();
                    timelapsePlayer.on('play', function() {
                        $('.vjs-big-play-button').hide();
                    });
                });
            });
        });

        timelapseYearPrevious = parseInt(year, 10);
        timelapseYearNext = parseInt(year, 10);

        // set values on buttons
        if (parseInt(month, 10) - 1 == 0) {
            timelapseMonthPrevious = 12;
        } else {
            timelapseMonthPrevious = parseInt(month, 10) - 1;
        }

        if (parseInt(month, 10) + 1 == 13) {
            timelapseMonthNext = 1;
        } else {
            timelapseMonthNext = parseInt(month, 10) + 1;
        }

        if (parseInt(month, 10) == 1) {
            timelapseYearPrevious = parseInt(year, 10) - 1;
        }

        if (parseInt(month, 10) == 12) {
            timelapseYearNext = parseInt(year, 10) + 1;
        }

        // set the button values
        $('#timelapse-previous').val(timelapseMonthPrevious);
        $('#timelapse-next').val(timelapseMonthNext);
        $('#timelapse-year-previous').val(timelapseYearPrevious);
        $('#timelapse-year-next').val(timelapseYearNext);

        // set date range
        if (month == rightnow.format('M') && parseInt(year, 10) == 2014) {
            $('#timelapse-next').addClass('disabled');
        } else {
            $('#timelapse-next').removeClass('disabled');
        }

        // no videos before August 2013
        if (parseInt(month, 10) == 8 && parseInt(year, 10) == 2013) {
            $('#timelapse-previous').addClass('disabled');
        } else {
            $('#timelapse-previous').removeClass('disabled');
        }

    }


    getCalendar(parseInt(rightnow.format('YYYY'), 10), parseInt(rightnow.format('MM'), 10));

    // listen to months buttons
    $('#timelapse-previous').click(function() {
        getCalendar($('#timelapse-year-previous').val(), $('#timelapse-previous').val());
    });

    $('#timelapse-next').click(function() {
        getCalendar($('#timelapse-year-next').val(), $('#timelapse-next').val());
    });
});