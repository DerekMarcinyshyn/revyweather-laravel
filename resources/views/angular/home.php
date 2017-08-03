<div ng-controller="HomeController" ng-cloak>
    <md-content layout="column" layout-fill>
        <div ng-repeat="warning in warnings track by $index">
            <div layout="row" layout-align="center">
                <md-card flex="100" flex-gt-md="66"
                         class="alert md-whiteframe-6dp"
                         ng-class="warning.alertClass"
                         ng-show="showWarnings">
                    <md-card-title>
                        <a href="{{ airport.warnings['@attributes'].url }}" target="_blank">
                            {{ warning.description }} &nbsp; <i class="fa fa-external-link"></i>
                        </a>
                    </md-card-title>
                    <md-card-content>{{ warning.textSummary }}</md-card-content>
                </md-card>
            </div>
        </div>

        <div layout="row" layout-align="center">
            <md-progress-circular md-mode="indeterminate" ng-hide="showCourthouse" class="md-primary" md-diameter="40"></md-progress-circular>
            <md-card ng-show="showCourthouse" flex="100" flex-gt-md="66">
                <md-card-title class="md-headline">Courthouse Revelstoke</md-card-title>
                <md-card-content>
                    <p class="text-summary">{{ courthouse.timestamp }}</p>
                    <div class="conditions" layout-fill layout-padding layout="column" layout-gt-xs="row">
                        <div flex-gt-xs="25" layout="row" layout-gt-xs="column">
                            <div flex="50" layout="column">
                                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                            </div>
                            <div flex="50" layout="column" class="container-temperature">
                                <span class="text-temperature">{{ courthouse.temperature | number:1 }}&deg;C</span>
                            </div>
                        </div>
                        <div flex-gt-xs="25" layout="column" class="text-conditions">
                            <p><span class="text-summary">Condition:</span> {{ darkSky.currently.summary }}</p>
                            <p><span class="text-summary">Pressure:</span> {{ courthouse.barometer }}kPa</p>
                            <p><span class="text-summary">Humidity:</span> {{ courthouse.relativehumidity | number:0 }}%</p>
                            <p><span class="text-summary">Wind:</span> {{ courthouse.direction }} &nbsp; {{ windSpeed }} km/h</p>
                            <p><span class="text-summary">Hourly gust:</span> {{ gust | number:0 }} km/h</p>
                        </div>
                        <div flex-gt-xs="50" layout="row">
                            <div flex="50">
                                <div id="gauge-courthouse" style="width:150px;height:110px;"></div>
                            </div>
                            <div flex="50">
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
                    </div>
            </md-card>
        </div>

        <div layout="row" layout-align="center">
            <md-progress-circular md-mode="indeterminate" ng-hide="showAirport" class="md-primary" md-diameter="40"></md-progress-circular>
            <md-card ng-show="showAirport" flex="100" flex-gt-md="66">
                <md-card-title class="md-headline">Revelstoke Airport</md-card-title>
                <md-card-content>
                    <p class="text-summary">{{ airport.currentConditions.dateTime[1].textSummary }}</p>
                    <div class="conditions"
                         layout-padding
                         layout="column"
                         layout-gt-xs="row"
                         ng-hide="(airport.currentConditions.dateTime[1].textSummary == undefined)"
                    >
                        <div flex-gt-xs="25" layout="row" layout-gt-xs="column">
                            <div flex="50" layout="column">
                                <img src="img/ec/icons-large/00.png" ng-src="img/ec/icons-large/{{ airport.currentConditions.iconCode }}.png"
                                     alt="" width="80" height="80" />
                            </div>
                            <div flex="50" layout="column">
                                <span class="text-temperature">{{ airport.currentConditions.temperature | number:1 }}&deg;C</span>
                            </div>
                        </div>
                        <div flex-gt-xs="25" layout="column" class="text-conditions">
                            <p><span class="text-summary">Condition:</span> {{ airport.currentConditions.condition }}</p>
                            <p><span class="text-summary">Pressure:</span> {{ airport.currentConditions.pressure | number:1 }}kPa</p>
                            <p><span class="text-summary">Humidity:</span> {{ airport.currentConditions.relativeHumidity | number:0 }}%</p>
                            <p><span class="text-summary">Wind:</span> {{ airport.currentConditions.wind.direction | ecDirection }} &nbsp; {{ airport.currentConditions.wind.speed | number:1 }} km/h</p>
                        </div>
                        <div flex-gt-xs="50" layout="row">
                            <div flex="50">
                                <div id="gauge-airport" style="width:150px;height:110px;"></div>
                            </div>
                            <div flex="50">
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
                    </div>
                    <div style="color:darkred" layout-padding
                         ng-show="(airport.currentConditions.dateTime[1].textSummary == undefined)">
                        Not observed
                    </div>
                    <h2 layout="row" class="forecast" layout-padding>Forecast</h2>
                    <div class="forecast" layout="column" layout-gt-xs="row">
                        <md-whiteframe ng-repeat="forecast in airport.forecastGroup.forecast | limitTo:5"
                                       class="md-whiteframe-4dp layout-padding layout-margin"
                                       flex-gt-xs="20"
                                       layout-gt-xs="column">
                            <h3 class="forecast-day">{{ forecast.period }}</h3>
                            <div layout="row" layout-gt-xs="column">
                                <div flex="50">
                                    <img src="" ng-src="img/ec/icons-large/{{ forecast.abbreviatedForecast.iconCode }}.png"
                                         alt="" width="80" height="80" />
                                </div>
                                <div flex="50">
                                    <span class="text-temperature">{{ forecast.temperatures.temperature | number:0 }}&deg;C</span>
                                </div>
                            </div>
                            <p>{{ forecast.textSummary }}</p>
                        </md-whiteframe>
                    </div>
                    <p class="powered-by">Powered by <a href="http://weather.gc.ca/city/pages/bc-65_metric_e.html" target="_blank">Environment Canada</a> updated every hour.</p>
                </md-card-content>
            </md-card>
        </div>

        <div layout="row" layout-align="center">
            <md-progress-circular md-mode="indeterminate" ng-hide="showDowntown" class="md-primary" md-diameter="40"></md-progress-circular>
            <md-card ng-show="showDowntown" flex="100" flex-gt-md="66">
                <md-card-title class="md-headline">Downtown Revelstoke</md-card-title>
                <md-card-content>
                    <p class="text-summary">{{ darkSky.currently.time * 1000 | date:'medium' }}</p>
                    <div class="conditions" layout-padding layout="column" layout-gt-xs="row">
                        <div flex-gt-xs="25" layout="row" layout-gt-xs="column">
                            <div flex="50" layout="column">
                                <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                            </div>
                            <div flex="50" layout="column" class="container-temperature">
                                <span class="text-temperature">{{ darkSky.currently.temperature | number:1 }}&deg;C</span>
                            </div>
                        </div>
                        <div flex-gt-xs="25" layout="column" class="text-conditions">
                            <p><span class="text-summary">Condition:</span> {{ darkSky.currently.summary }}</p>
                            <p><span class="text-summary">Pressure:</span> {{ darkSky.currently.pressure / 10 | number:1 }}kPa</p>
                            <p><span class="text-summary">Humidity:</span> {{ darkSky.currently.humidity * 100 | number:0 }}%</p>
                            <p><span class="text-summary">Wind:</span> {{ darkSky.currently.windBearing | windDirection }} &nbsp; {{ darkSky.currently.windSpeed | number:1 }} km/h</p>
                        </div>
                        <div flex-gt-xs="50" layout="row">
                            <div flex="50">
                                <div id="gauge-downtown" style="width:150px;height:110px;"></div>
                            </div>
                            <div flex="50">
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
                    </div>
                    <h2 layout="row" class="forecast" layout-padding>Forecast</h2>
                    <p layout="row" layout-padding>{{ darkSky.daily.summary }}</p>
                    <div class="forecast" layout="column" layout-gt-xs="row">
                        <md-whiteframe ng-repeat="darkSky in darkSky.daily.data | limitTo:5"
                                       class="md-whiteframe-4dp layout-padding layout-margin"
                                       flex-gt-xs="20"
                                       layout-gt-xs="column">
                            <h3>{{ darkSky.time * 1000 | date:'EEEE' }}</h3>
                            <div layout-gt-xs="column" layout="row">
                                <div flex="50">
                                    <div class="climacon {{ darkSky.icon | climacons }}"></div>
                                </div>
                                <div flex="50">
                                    <p>
                                        <span class="label-high">HIGH</span> &nbsp; <span class="text-temperature">{{ darkSky.temperatureMax | number:0 }}&deg;C</span>
                                    </p>
                                    <p>
                                        <span class="label-low">LOW</span> &nbsp; <span class="text-temperature">{{ darkSky.temperatureMin | number:0 }}&deg;C</span>
                                    </p>
                                </div>
                            </div>
                            <p>{{ darkSky.summary }}</p>
                        </md-whiteframe>
                    </div>
                    <p class="powered-by">Powered by <a href="https://darksky.net" target="_blank">Dark Sky</a> updated every 10 minutes.</p>
                </md-card-content>
            </md-card>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </md-content>
</div>