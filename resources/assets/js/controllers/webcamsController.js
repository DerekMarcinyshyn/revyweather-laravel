revyWeatherApp.controller('WebcamsController', function($scope, $mdDialog) {
    $scope.webcams = [
        {
            title: 'Mt Mackenzie',
            url: 'courthouse.jpg'
        },{
            title: 'Monashee Mountains',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/stoke.jpg'
        },{
            title: 'Ripper Chair',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/ripper.jpg'
        },{
            title: 'Mackenzie Outpost',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/gondola.jpg'
        },{
            title: 'Gnorm',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/gnome.jpg'
        },{
            title: 'Revelstoke',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/11.jpg'
        },{
            title: 'Highway 23 North/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/584.jpg'
        },{
            title: 'Highway 23 South/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/585.jpg'
        },{
            title: 'Highway 23 South/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/586.jpg'
        },{
            title: 'Highway 23 South/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/587.jpg'
        },{
            title: 'Clanwilliam Overpass - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/296.jpg'
        },{
            title: 'Clanwilliam Overpass - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/517.jpg'
        },{
            title: '3 Valley Gap',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/12.jpg'
        },{
            title: 'Jack McDonald Snowshed',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/159.jpg'
        },{
            title: 'Rogers Pass',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/101.jpg'
        },{
            title: 'Donald Bridge - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/385.jpg'
        },{
            title: 'Donald Bridge - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/386.jpg'
        },{
            title: 'Golden',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/135.jpg'
        },{
            title: 'Kicking Horse Canyon',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/214.jpg'
        },{
            title: 'Field NE',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/142.jpg'
        },{
            title: 'Field',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/189.jpg'
        },{
            title: 'Lake Louise - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/218.jpg'
        },{
            title: 'Lake Louise - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/219.jpg'
        },{
            title: 'Banff - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/220.jpg'
        },{
            title: 'Banff - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/221.jpg'
        }
    ];

    $scope.expand = function($event, url) {
        $mdDialog.show({
            targetEvent: $event,
            parent: angular.element(document.body),
            fullscreen: true,
            clickOutsideToClose: true,
            template:
                '<md-dialog aria-label="Fullscreen webcam" layout-fill>' +
                    '<md-dialog-actions>' +
                    '<md-button ng-click="closeDialog()" class="md-icon-button text-white" aria-label="Close">' +
                    '<i class="fa fa-times"></i>' +
                    '</md-button>' +
                    '</md-dialog-actions>' +
                    '<md-dialog-content>' +
                    '<img ng-src="' + url +'" width="100%" height="auto" />' +
                    '</md-dialog-content>' +
                '</md-dialog>',
            controller: DialogController
        });
    };

    function DialogController($scope, $mdDialog) {
        $scope.closeDialog = function() {
            $mdDialog.hide();
        }
    }
});