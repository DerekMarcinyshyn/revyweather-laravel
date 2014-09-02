<?php
$I = new AcceptanceTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the webcams page loads.');

$I->amOnPage('webcams');
$I->canSee('Mt Mackenzie');