<div ng-controller="HomeController" ng-cloak>
    <section >
        <h1>Courthouse Revelstoke</h1>
    </section>

    <section>
        <h1>Downtown Revelstoke</h1>
    </section>

    <section>
        <h1>Revelstoke Airport</h1>
        <p>{{ airport.currentConditions.dateTime[1].textSummary }}</p>

        <article class="conditions">
            <div flex>
                <img ng-src="img/ec/icons-large/{{ airport.currentConditions.iconCode }}.png" alt="" width="80" height="80" />
                <div class="current-temperature">
                    {{ airport.currentConditions.temperature | number:1 }}&deg;C
                </div>
            </div>
            <div flex>
                <p><span class="text-muted">Condition:</span> {{ airport.currentConditions.condition }}</p>
                <p><span class="text-muted">Pressure:</span> {{ airport.currentConditions.pressure | number:1 }}kPa</p>
                <p><span class="text-muted">Humidity:</span> {{ airport.currentConditions.relativeHumidity | number:0 }}%</p>
                <p><span class="text-muted">Wind:</span> {{ airport.currentConditions.wind.direction | ecDirection }} &nbsp; {{ airport.currentConditions.wind.speed | number:1 }} km/h</p>
            </div>
            <div flex>
                Wind speed gauge
            </div>
            <div flex>
                Compass gauge
            </div>
        </article>
        <article class="forecast">
            forecast
        </article>
    </section>
</div>
