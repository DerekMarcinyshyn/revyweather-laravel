revyWeatherApp.filter('ecDirection', function() {
    return function(input) {
        if (input == "" || input == undefined)
            return '';
        else
            return input;
    }
});

revyWeatherApp.filter('windDirection', function() {
    return function(input) {
        var directions = ['N', 'NE', 'E', 'SE', 'S', 'SW', 'W', 'NW', 'N'];
        return directions[Math.round(input/45)];
    }
});

revyWeatherApp.filter('climacons', function() {
    return function(input) {
        return input.replace(/-/g, " ");
    }
});