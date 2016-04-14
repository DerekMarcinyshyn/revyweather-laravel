<section ng-controller="TimelapseController" ng-cloak>
    <md-content layout="column">
        <div layout="row" layout-align="center">
            <md-card flex="100" flex-gt-md="66">
                <md-datepicker ng-model="timelapseDate" md-placeholder="Select a date"
                               ng-change="videoDateChange()"
                               md-min-date="minDate" md-max-date="maxDate">
                </md-datepicker>
                <md-card-title class="md-headline">{{ timelapseDate | date:'MMMM d, yyyy'}}</md-card-title>
                <md-card-content>
                    <video id="timelapse-video" class="video-js vjs-default-skin vjs-big-play-centered"
                           controls preload="none" width="540" height="304"
                           poster="img/weather-station.jpg" data-setup="{}">
                        <?php $yesterday = new DateTime; ?>
                        <?php $yesterday->add(DateInterval::createFromDateString('yesterday')) ?>
                        <?php $yesterdayVideo = $yesterday->format('Y').'/'.
                            $yesterday->format('F').'/'.
                            $yesterday->format('d').'/'.
                            $yesterday->format('F-d') ?>
                        <source src="//d19od77dpzy72f.cloudfront.net/<?php echo $yesterdayVideo ?>.mp4" type="video/mp4">
                        <source src="//d19od77dpzy72f.cloudfront.net/<?php echo $yesterdayVideo ?>.webm" type="video/webm">
                        <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                    </video>
                </md-card-content>
            </md-card>
        </div>
    </md-content>
</section>