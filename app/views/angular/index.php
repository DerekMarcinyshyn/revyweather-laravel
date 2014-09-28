<div data-ng-app="rightNowApp" ng-cloak>
    <div data-ng-controller="RightNowController">

        <div data-ng-show="airport.warnings.event" class="col-md-12">
            <div class="alert {{ alertClass }}">
                <p><a href="{{ airport.warnings['@attributes'].url }}" target="_blank">
                       <strong>{{ airport.warnings.event["@attributes"].description }}</strong>
                    </a></p>
                <p>{{ airport.warnings.event.dateTime[1].textSummary }}</p>
            </div>
        </div>


        <div class="col-md-12">
            <h3>Courthouse Area Revelstoke</h3>
            <p class="text-muted timestamp">{{ courthouse.timestamp }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3 col-xs-6 conditions">
            <div class="bottom">
                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                <div class="current-temperature">{{ courthouse.temperature | number:1 }}&deg;C</div>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions">
            <div class="bottom">
                <p class="right-now"><span class="text-muted">Condition:</span> {{ forecastio.currently.summary }}</p>
                <p class="right-now"><span class="text-muted">Pressure:</span> {{ courthouse.barometer }} kPa</p>
                <p class="right-now"><span class="text-muted">Humidity:</span> {{ courthouse.relativehumidity | number:0 }}%</p>
                <p class="right-now"><span class="text-muted">Wind:</span> {{ courthouse.direction }} &nbsp; {{ windSpeed }} km/h</p>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions compass-container">
            <div class="bottom">
                <div id="gauge-courthouse" style="width:200px; height: 160px;"></div>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions compass-container">
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


        <div class="col-md-12">
            <p class="powered-by">Powered by <a href="http://netduino.com/netduinoplus2/specs.htm" target="_blank">Netduino Plus 2</a> and <a href="http://www.raspberrypi.org/" target="_blank">RaspberryPi</a> updated every 10 seconds.</p>
        </div>

        <hr class="col-md-12">

        <div class="col-md-12">
            <h3>Downtown Revelstoke</h3>
            <p class="text-muted timestamp">{{ forecastio.currently.time * 1000 | date:'medium' }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3 col-xs-6 conditions">
            <div class="bottom">
                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                <div class="current-temperature">{{ forecastio.currently.temperature | number:1 }}&deg;C</div>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions">
            <div class="bottom">
                <p class="right-now"><span class="text-muted">Condition:</span> {{ forecastio.currently.summary }}</p>
                <p class="right-now"><span class="text-muted">Feels like:</span> {{ forecastio.currently.apparentTemperature | number:1 }}&deg;C</p>
                <p class="right-now"><span class="text-muted">Pressure:</span> {{ forecastio.currently.pressure / 10 | number:1 }} kPa</p>
                <p class="right-now"><span class="text-muted">Humidity:</span> {{ forecastio.currently.humidity * 100 | number:0 }}%</p>
                <p class="right-now"><span class="text-muted">Wind:</span> {{ forecastio.currently.windBearing | windDirection }} &nbsp; {{ forecastio.currently.windSpeed | number:1 }} km/h</p>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions compass-container">
            <div class="bottom">
                <div id="gauge-downtown" style="width:200px; height: 160px;"></div>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions compass-container">
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

        <div class="col-md-12">
            <h4>Forecast Summary</h4>
            <p>{{ forecastio.daily.summary }}</p>

            <button class="btn btn-sm show-forecastio" data-ng-click="isForecastCollapsed = !isForecastCollapsed">
                <i class="fa {{ isForecastCollapsed ? 'fa-caret-right' : 'fa-caret-down' }}"></i> &nbsp; Daily Forecast</button>
            <div collapse="isForecastCollapsed">
                <div class="forecastio-forecast-container">
                    <div class="forecastio" data-ng-repeat="forecast in forecastio.daily.data | limitTo:5">
                        <div class="climacon {{ forecast.icon | climacons }}"></div>
                        <div class="forecast-summary">
                            <h4>{{ forecast.time * 1000 | date:'EEEE' }}</h4>
                            <p>High: {{ forecast.temperatureMax | number:1 }}&deg;C Low: {{ forecast.temperatureMin | number:1 }}&deg;C</p>
                            <p>{{ forecast.summary }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <p class="powered-by">Powered by <a href="http://forecast.io" target="_blank">Forecast.io</a> updated every 3 minutes.</p>
        </div>

        <hr class="col-md-12">

        <div class="col-md-12">
            <h3>Revelstoke Airport</h3>
            <p class="text-muted timestamp">{{ airport.currentConditions.dateTime[1].textSummary }}</p>
        </div>
        <!-- split into 4 columns -->
        <div class="col-md-3 col-xs-6 conditions">
            <div class="bottom">
                <img id="icon-image" data-ng-src="assets/img/ec/icons-large/{{ airport.currentConditions.iconCode }}.png" alt="{{ airport.currentConditions.condition }}" width="80" height="80" />
                <div class="current-temperature">{{ airport.currentConditions.temperature | number:1 }}&deg;C</div>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions">
            <div class="bottom">
                <p class="right-now"><span class="text-muted">Condition:</span> {{ airport.currentConditions.condition }}</p>
                <p class="right-now"><span class="text-muted">Pressure:</span> {{ airport.currentConditions.pressure | number:1 }} kPa</p>
                <p class="right-now"><span class="text-muted">Humidity:</span> {{ airport.currentConditions.relativeHumidity | number:0 }}%</p>
                <p class="right-now"><span class="text-muted">Wind:</span> {{ airport.currentConditions.wind.direction | ecDirection }} &nbsp; {{ airport.currentConditions.wind.speed | number:1 }} km/h</p>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions compass-container">
            <div class="bottom">
                <div id="gauge-airport" style="width:200px; height: 160px;"></div>
            </div>
        </div>
        <div class="col-md-3 col-xs-6 conditions compass-container">
            <div class="bottom">
                <div class="compass">
                    <div class="compass-inner">
                        <div class="north">N</div>
                        <div class="east">E</div>
                        <div class="west">W</div>
                        <div class="south">S</div>
                        <div data-ng-style="arrowAirport" class="main-arrow">
                            <div class="arrow-up"></div>
                            <div class="arrow-down"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <h4>Today</h4>
            <p>{{ airport.forecastGroup.regionalNormals.textSummary }}</p>
            <button class="btn btn-sm show-forecastio" data-ng-click="isEcForecastCollapsed = !isEcForecastCollapsed">
                <i class="fa {{ isEcForecastCollapsed ? 'fa-caret-right' : 'fa-caret-down' }}"></i> &nbsp;  Daily Forecast</button>
            <div collapse="isEcForecastCollapsed" class="forecast-container-collapse">
                <div class="forecastio-forecast-container">
                    <div class="forecastio" data-ng-repeat="forecast in airport.forecastGroup.forecast | limitTo:5">
                        <div class="ec-forecast-image">
                            <img data-ng-src="assets/img/ec/icons-large/{{ forecast.abbreviatedForecast.iconCode }}.png" alt="" width="70" height="70" />
                        </div>
                        <div class="forecast-summary">
                            <h4>{{ forecast.period }}</h4>
                            <p class="ec-temperature">{{ forecast.temperatures.temperature | number:1 }}&deg;C</p>
                            <p>{{ forecast.textSummary }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <p class="powered-by">Powered by <a href="http://weather.gc.ca/canada_e.html" target="_blank">Environment Canada</a> updated every hour.</p>
        </div>

    </div>
</div>