revyWeatherApp.controller('WebcamsController', ['$scope', '$mdDialog', function($scope, $mdDialog) {
    var time = new Date().getTime();
    $scope.webcams = [
        {
            title: 'Mt Mackenzie',
            url: 'courthouse.jpg?'+time
        },{
            title: 'Monashee Mountains',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/stoke.jpg?'+time
        },{
            title: 'Gnorm',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/gnorm.jpg?'+time
        },{
            title: 'Top of RMR Gondola',
            url: 'http://www.revelstokemountainresort.com/uploads/webcams/gondola.jpg?'+time
        },{
            title: 'Rogers Pass',
            url: 'http://www.pc.gc.ca/images/remotecamera/landscape.jpg?'+time
        },{
            title: 'Fidelity Snow Plot',
            url: 'http://www.pc.gc.ca/images/remotecamera/snowstake.jpg?'+time
        },{
            title: 'Revelstoke',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/11.jpg?'+time
        },{
            title: 'Highway 23 North/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/584.jpg?'+time
        },{
            title: 'Highway 23 South/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/585.jpg?'+time
        },{
            title: 'Highway 23 South/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/586.jpg?'+time
        },{
            title: 'Highway 23 South/TCH',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/587.jpg?'+time
        },{
            title: 'Clanwilliam Overpass - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/296.jpg?'+time
        },{
            title: 'Clanwilliam Overpass - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/517.jpg?'+time
        },{
            title: '3 Valley Gap',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/12.jpg?'+time
        },{
            title: 'Jack McDonald Snowshed',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/159.jpg?'+time
        },{
            title: 'Rogers Pass',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/101.jpg?'+time
        },{
            title: 'Donald Bridge - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/385.jpg?'+time
        },{
            title: 'Donald Bridge - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/386.jpg?'+time
        },{
            title: 'Golden',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/135.jpg?'+time
        },{
            title: 'Kicking Horse Canyon',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/214.jpg?'+time
        },{
            title: 'Field NE',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/142.jpg?'+time
        },{
            title: 'Field',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/189.jpg?'+time
        },{
            title: 'Lake Louise - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/218.jpg?'+time
        },{
            title: 'Lake Louise - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/219.jpg?'+time
        },{
            title: 'Banff - West',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/220.jpg?'+time
        },{
            title: 'Banff - East',
            url: 'http://images.drivebc.ca/bchighwaycam/pub/cameras/221.jpg?'+time
        }
    ];

    $scope.expand = function(event, url) {
        $mdDialog.show({
            targetEvent: event,
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
        }).catch(function(e) {
            console.log(e);
        });
    };

    function DialogController($scope, $mdDialog) {
        $scope.closeDialog = function() {
            $mdDialog.hide();
        }
    }
}]);