<nav ng-controller="NavController" ng-cloak>
    <section layout="row" flex>
        <md-sidenav
                class="md-sidenav-left"
                md-component-id="left"
                md-disable-backdrop
                md-whiteframe="4">
            <md-toolbar class="md-theme-indigo">
                <div class="md-toolbar-tools">
                    <md-button ng-click="closeSidenav()" class="md-icon-button" aria-label="Close Navigation">
                        <md-icon><i class="fa fa-arrow-left"></i></md-icon>
                    </md-button>
                </div>
            </md-toolbar>
            <md-content layout-padding>
                <md-list>
                    <md-list-item>
                        <md-button ng-click="goto('/')" class="md-primary">Right Now</md-button>
                    </md-list-item>
                    <md-list-item>
                        <md-button ng-click="goto('/history')" class="md-primary">History</md-button>
                    </md-list-item>
                    <md-list-item>
                        <md-button ng-click="goto('/webcams')" class="md-primary">Webcams</md-button>
                    </md-list-item>
                    <md-list-item>
                        <md-button ng-click="goto('/map')" class="md-primary">Map</md-button>
                    </md-list-item>
                    <md-list-item>
                        <md-button ng-click="goto('/timelapse')" class="md-primary">Timelapse</md-button>
                    </md-list-item>
                    <md-list-item>
                        <md-button ng-click="goto('/about')" class="md-primary">About</md-button>
                    </md-list-item>
                </md-list>
            </md-content>
        </md-sidenav>
        <md-toolbar>
            <div class="md-toolbar-tools">
                <md-button ng-click="openSidenav()" class="md-icon-button" aria-label="Open Navigation">
                    <md-icon><i class="fa fa-bars"></i></md-icon>
                </md-button>
                <span flex></span>
                <h2><a href="{{ url('/') }}">Revelstoke Weather</a></h2>
                <span flex></span>
            </div>
        </md-toolbar>
    </section>
</nav>
