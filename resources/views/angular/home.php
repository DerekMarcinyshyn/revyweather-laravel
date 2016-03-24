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

            </div>
            <div flex>

            </div>
            <div flex>

            </div>
        </article>
        <article class="forecast">
            forecast
        </article>
    </section>
</div>
