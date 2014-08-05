<div data-ng-app="rightNowApp">
    <div data-ng-controller="RightNowController">
        <div class="col-md-12">
            <h3>Courthouse Area Revelstoke</h3>
            <p class="powered-by">Powered by <a href="http://netduino.com/netduinoplus2/specs.htm" target="_blank">Netduino Plus 2</a> and <a href="http://www.raspberrypi.org/" target="_blank">RaspberryPi</a></p>
            <p class="text-muted timestamp">{{ courthouse.timestamp }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3 conditions">
            <div class="bottom">
                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                <div class="current-temperature">{{ courthouse.temperature | number:1 }}&deg;C</div>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <p class="right-now"><span class="text-muted">Condition:</span> {{ forecastio.currently.summary }}</p>
                <p class="right-now"><span class="text-muted">Pressure:</span> {{ courthouse.barometer }} kPa</p>
                <p class="right-now"><span class="text-muted">Humidity:</span> {{ courthouse.relativehumidity | number:0 }}%</p>
                <p class="right-now"><span class="text-muted">Wind:</span> {{ courthouse.direction }} &nbsp; {{ windSpeed }}km/h</p>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <div id="gauge-courthouse" style="width:290px; height: 200px;"></div>
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
                        <div data-ng-style="arrowCourthouse" class="main-arrow">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="col-md-12">

        <div class="col-md-12">
            <h3>Downtown Revelstoke</h3>
            <p class="powered-by">Powered by <a href="http://forecast.io">Forecast.io</a></p>
            <p class="text-muted timestamp">{{ forecastio.currently.time * 1000 | date:'medium' }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3 conditions">
            <div class="bottom">
                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                <div class="current-temperature">{{ forecastio.currently.temperature | number:1 }}&deg;C</div>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <p class="right-now"><span class="text-muted">Condition:</span> {{ forecastio.currently.summary }}</p>
                <p class="right-now"><span class="text-muted">Feels like:</span> {{ forecastio.currently.apparentTemperature | number:1 }}&deg;C</p>
                <p class="right-now"><span class="text-muted">Pressure:</span> {{ forecastio.currently.pressure / 10 | number:1 }} kPa</p>
                <p class="right-now"><span class="text-muted">Humidity:</span> {{ forecastio.currently.humidity * 100 | number:0 }}%</p>
                <p class="right-now"><span class="text-muted">Wind:</span> {{ forecastio.currently.windBearing | windDirection }} &nbsp; {{ forecastio.currently.windSpeed | number:1 }}km/h</p>
            </div>
        </div>
        <div class="col-md-3 conditions">
            <div class="bottom">
                <div id="gauge-downtown" style="width:290px; height: 200px;"></div>
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
                        <div data-ng-style="arrowDowntown" class="main-arrow">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="col-md-12">

    </div>
</div>