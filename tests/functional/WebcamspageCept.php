<?php
$I = new FunctionalTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the webcams page loads.');

$I->amOnPage('/webcams');
$I->see('Mt Mackenzie', 'h2');