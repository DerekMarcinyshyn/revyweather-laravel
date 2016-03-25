<div ng-controller="HomeController" ng-cloak>
    <md-content layout-xs="column" layout="row">

        <md-card flex="66" flex-xs="100" flex-sm="90">
            <md-card-title class="md-headline">Courthouse Revelstoke</md-card-title>
        </md-card>

        <md-card flex="66" flex-xs="100" flex-sm="90">
            <md-card-title class="md-headline">Downtown Revelstoke</md-card-title>
            <md-card-content>
                <p class="text-summary">{{ forecastio.currently.time * 1000 | date:'medium' }}</p>
                <article class="conditions" layout="column">
                    <div layout="row">
                        <div flex="50">
                            <skycon icon="currentWeather.forecast.icon" color="black" size="currentWeather.forecast.iconSize"></skycon>
                        </div>
                        <div flex="50">
                            <span class="text-temperature">{{ forecastio.currently.temperature | number:1 }}&deg;C</span>
                        </div>
                    </div>
                    <div layout="column" class="text-conditions">
                        <p><span class="text-summary">Condition:</span> {{ forecastio.currently.summary }}</p>
                        <p><span class="text-summary">Pressure:</span> {{ forecastio.currently.pressure / 10 | number:1 }}kPa</p>
                        <p><span class="text-summary">Humidity:</span> {{ forecastio.currently.humidity * 100 | number:0 }}%</p>
                        <p><span class="text-summary">Wind:</span> {{ forecastio.currently.windBearing | windDirection }} &nbsp; {{ forecastio.currently.windSpeed | number:1 }} km/h</p>
                    </div>
                    <div layout="row">
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
                </article>
                <article class="forecast" layout="column">
                    <h2>Forecast</h2>
                    <p>{{ forecastio.daily.summary }}</p>
                    <md-whiteframe ng-repeat="forecastio in forecastio.daily.data | limitTo:5"
                                   class="md-whiteframe-4dp layout-padding">
                        <h3>{{ forecastio.time * 1000 | date:'EEEE' }}</h3>
                        <div layout="row">
                            <div flex="50">
                                <div class="climacon {{ forecastio.icon | climacons }}"></div>
                            </div>
                            <div flex="50">
                                <p>
                                    <span class="label">HIGH</span> &nbsp; <span class="text-temperature">{{ forecastio.temperatureMax | number:0 }}&deg;C</span>
                                </p>
                                <p>
                                    <span class="label">LOW</span> &nbsp; <span class="text-temperature">{{ forecastio.temperatureMin | number:0 }}&deg;C</span>
                                </p>
                            </div>
                        </div>
                        <p>{{ forecastio.summary }}</p>
                    </md-whiteframe>
                    <p class="powered-by">Powered by <a href="" target="_blank">Forecast.io</a> updated every hour.</p>
                </article>
            </md-card-content>
        </md-card>

        <md-card flex="66" flex-xs="100" flex-sm="90">
            <md-card-title class="md-headline">Revelstoke Airport</md-card-title>
            <md-card-content>
                <p class="text-summary">{{ airport.currentConditions.dateTime[1].textSummary }}</p>
                <article class="conditions" layout="column">
                    <div layout="row">
                        <div flex="50">
                            <img src="" ng-src="img/ec/icons-large/{{ airport.currentConditions.iconCode }}.png"
                                 alt="" width="80" height="80" />
                        </div>
                        <div flex="50">
                            <span class="text-temperature">{{ airport.currentConditions.temperature | number:1 }}&deg;C</span>
                        </div>
                    </div>
                    <div layout="column" class="text-conditions">
                        <p><span class="text-summary">Condition:</span> {{ airport.currentConditions.condition }}</p>
                        <p><span class="text-summary">Pressure:</span> {{ airport.currentConditions.pressure | number:1 }}kPa</p>
                        <p><span class="text-summary">Humidity:</span> {{ airport.currentConditions.relativeHumidity | number:0 }}%</p>
                        <p><span class="text-summary">Wind:</span> {{ airport.currentConditions.wind.direction | ecDirection }} &nbsp; {{ airport.currentConditions.wind.speed | number:1 }} km/h</p>
                    </div>
                    <div layout="row">
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
                </article>
                <article class="forecast" layout="column">
                    <h2>Forecast</h2>
                    <md-whiteframe ng-repeat="forecast in airport.forecastGroup.forecast | limitTo:5" 
                                   class="md-whiteframe-4dp layout-padding">
                        <h3>{{ forecast.period }}</h3>
                        <div layout="row">
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
                    <p class="powered-by">Powered by <a href="http://weather.gc.ca/city/pages/bc-65_metric_e.html" target="_blank">Environment Canada</a> updated every hour.</p>
                </article>
            </md-card-content>
        </md-card>
    </md-content>
</div>