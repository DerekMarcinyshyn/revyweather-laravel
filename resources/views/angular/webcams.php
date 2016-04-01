<div ng-controller="WebcamsController" ng-cloak>
    <md-content class="webcams-bg" layout="column" layout-padding>
        <md-grid-list md-cols-gt-md="3" md-cols="1"
                      md-row-height-gt-md="1:1" md-row-height="2:2"
                      md-gutter-gt-md="16px" md-gutter="20px">
            <md-grid-tile ng-repeat="webcam in webcams">
                <div class="webcams md-whiteframe-10dp">
                    <h2 class="md-headline">
                        {{ webcam.title }}
                        <md-button style="float:right"
                                   class="md-icon-button"
                                   aria-label="Expand"
                                   ng-click="expand($event, webcam.url)">
                            <i class="fa fa-expand"></i>
                        </md-button>
                    </h2>
                    <img src="" ng-src="{{ webcam.url }}" width="100%" height="auto" />
                </div>
            </md-grid-tile>
        </md-grid-list>
    </md-content>
</div>