<div ng-controller="HomeController" ng-cloak>
    <md-content layout-xs="column" layout="row">

        <md-card flex="66" flex-xs="100" flex-sm="90">
            <md-card-title class="md-headline">Courthouse Revelstoke</md-card-title>
        </md-card>

        <md-card flex="66" flex-xs="100" flex-sm="90">
            <md-card-title class="md-headline">Downtown Revelstoke</md-card-title>
        </md-card>

        <md-card flex="66" flex-xs="100" flex-sm="90">
            <md-card-title class="md-headline">Revelstoke Airport</md-card-title>
            <md-card-content>
                <p class="text-summary">{{ airport.currentConditions.dateTime[1].textSummary }}</p>
                <article class="conditions" layout="column">
                    <div layout="row">
                        <div flex="50">
                            <img src="" ng-src="img/ec/icons-large/{{ airport.currentConditions.iconCode }}.png" alt="" width="80" height="80" />
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
                            <p>Wind speed gauge</p>
                        </div>
                        <div flex="50">
                            <p>Compass gauge</p>
                        </div>
                    </div>
                </article>
                <article class="forecast">
                    <h2>forecast</h2>
                </article>
            </md-card-content>
        </md-card>
    </md-content>
</div>