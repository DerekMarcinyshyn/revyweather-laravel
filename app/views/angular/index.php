<div data-ng-app="rightNowApp">
    <div data-ng-controller="RightNowController">
        <div class="col-md-12">
            <h1>Right Now</h1>
            <h3>Courthouse Area</h3>
            <p class="text-muted timestamp">{{ courthouseTimestamp }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3">
            <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
        </div>
        <div class="col-md-3">
            <p class="right-now"><span class="text-muted">Condition:</span> {{ forecastio.currently.summary }}</p>
            <p class="right-now"><span class="text-muted">Pressure:</span> {{ courthousePressure }}</p>
            <p class="right-now"><span class="text-muted">Humidity:</span> {{ courthouseHumidity }}</p>
            <p class="right-now"><span class="text-muted">Wind:</span> {{ courthouseWind }}</p>
        </div>
        <div class="col-md-3">
            column 3
        </div>
        <div class="col-md-3">
            column 4
        </div>

        <div class="col-md-12">
            <h3>Revelstoke Airport</h3>
            <p class="text-muted timestamp">{{ courthouseTimestamp }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3">
            column 1
        </div>
        <div class="col-md-3">
            column 2
        </div>
        <div class="col-md-3">
            column 3
        </div>
        <div class="col-md-3">
            column 4
        </div>

    </div>
</div>