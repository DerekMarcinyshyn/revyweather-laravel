<div data-ng-app="rightNowApp">
    <div data-ng-controller="RightNowController">
        <div class="col-md-12">
            <h1>Right Now</h1>
            <h3>Courthouse Area</h3>
            <p class="text-muted timestamp">{{ courthouse.timestamp }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3 conditions">
            <div class="bottom">
                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                <div class="current-temperature">{{ courthouse.bmp_temperature | number:1 }}&deg;C</div>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <p class="right-now"><span class="text-muted">Condition:</span> {{ forecastio.currently.summary }}</p>
                <p class="right-now"><span class="text-muted">Pressure:</span> {{ courthouse.barometer }} kPa</p>
                <p class="right-now"><span class="text-muted">Humidity:</span> {{ courthouse.relativehumidity | number:0 }}%</p>
                <p class="right-now"><span class="text-muted">Wind:</span> {{ courthouse.direction }} {{ courthouse.speed }}km/h</p>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <div id="gauge-speed" style="width:290px; height: 200px;"></div>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <div class="compass">
                    <div class="compass-inner">
                        <div class="north">N</div>
                        <div class="east">E</div>
                        <div class="west">W</div>
                        <div class="south">S</div>
                        <div data-ng-style="arrowRotate" class="main-arrow">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="col-md-12">

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