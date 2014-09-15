<?php
$I = new FunctionalTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the timelapse page loads');

$I->amOnPage('/timelapse');
$I->see('Timelapse', 'h1');
