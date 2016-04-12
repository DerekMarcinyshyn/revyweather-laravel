<nav ng-controller="NavController" ng-cloak>
    <section layout="row" flex>
        <md-sidenav
                class="md-sidenav-left"
                md-component-id="left"
                md-disable-backdrop
                md-whiteframe="4">
            <md-toolbar class="md-theme-indigo" ng-click="closeSidenav()">
                <div class="md-toolbar-tools">
                    <md-button ng-click="closeSidenav()" class="md-icon-button" aria-label="Close Navigation">
                        <md-icon><i class="fa fa-arrow-left"></i></md-icon>
                    </md-button>
                    &nbsp;Revy Weather
                </div>
            </md-toolbar>
            <md-content>
                <md-list>
                    <md-list-item ng-click="goto('/')">
                        <i class="fa fa-cloud"></i> &nbsp;&nbsp; Right Now
                    </md-list-item>
                    <md-list-item ng-click="goto('/history')">
                        <i class="fa fa-line-chart"></i> &nbsp;&nbsp; History
                    </md-list-item>
                    <md-list-item ng-click="goto('/webcams')">
                        <i class="fa fa-camera-retro"></i> &nbsp;&nbsp; Webcams
                    </md-list-item>
                    <md-list-item ng-click="goto('/map')">
                        <i class="fa fa-map-o"></i> &nbsp;&nbsp; Map
                    </md-list-item>
                    <md-list-item ng-click="goto('/timelapse')">
                        <i class="fa fa-hourglass"></i> &nbsp;&nbsp; Timelapse
                    </md-list-item>
                    <md-list-item ng-click="goto('/about')">
                        <i class="fa fa-info-circle"></i> &nbsp;&nbsp; About
                    </md-list-item>
                </md-list>
            </md-content>
        </md-sidenav>
        <md-toolbar>
            <div class="md-toolbar-tools">
                <md-button ng-click="openSidenav()" class="md-icon-button hamburger" aria-label="Open Navigation">
                    <md-icon><i class="fa fa-bars"></i></md-icon>
                </md-button>
                <span flex></span>
                <h2><a href="{{ url('/') }}">Revy Weather</a></h2>
                <span flex></span>
            </div>
        </md-toolbar>
    </section>
</nav>
