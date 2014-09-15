jQuery(document).ready(function($) {

    var timelapseMonthPrevious;
    var timelapseMonthNext;
    var timelapseYearPrevious;
    var timelapseYearNext;
    var rightnow = moment();

    // Timelapse video Calendar
    function getCalendar(year, month) {

        console.log('year: ' + year + ' month: ' + month);

        $.post('/api/get-timelapse-calendar-dates', {year: year, month: month}, function(data) {
            $('#timelapse-calendar').html(data.data);
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