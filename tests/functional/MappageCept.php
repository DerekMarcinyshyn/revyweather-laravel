<?php
$I = new FunctionalTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the map page loads.');

$I->amOnPage('/map');
$I->seeElement('.map-content');
