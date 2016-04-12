revyWeatherApp.controller('TimelapseController', function($scope, $filter) {
    $scope.timelapseDate = new Date();
    $scope.timelapseDate.setDate($scope.timelapseDate.getDate() -1);
    $scope.minDate = new Date("August 25, 2013");
    $scope.maxDate = new Date(
        $scope.timelapseDate.getFullYear(),
        $scope.timelapseDate.getMonth(),
        $scope.timelapseDate.getDate());

    $scope.videoDateChange = function() {
        var month = $filter('date')($scope.timelapseDate, 'MMMM');
        var day = $filter('date')($scope.timelapseDate, 'dd');
        var video = '//video.revyweather.com/'+$scope.timelapseDate.getFullYear()+'/'+month+'/'+day+'/'+month+'-'+day;
        var videoPlayer = videojs('timelapse-video');
        videoPlayer.ready(function() {
            var timelapsePlayer = this;
            timelapsePlayer.pause();
            timelapsePlayer.src([
                { type: 'video/mp4', src: video+'.mp4' },
                { type: 'video/webm', src: video+'.webm'}
            ]);
            timelapsePlayer.load();
        });
    };
});