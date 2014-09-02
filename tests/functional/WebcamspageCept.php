<?php
$I = new FunctionalTester($scenario);

$I->am('a visitor');
$I->wantTo('make sure the webcams page loads.');

$I->amOnPage('/webcams');
$I->canSee('Mt Mackenzie');