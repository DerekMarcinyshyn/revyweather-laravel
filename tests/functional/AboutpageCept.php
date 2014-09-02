<?php
$I = new FunctionalTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the about page loads.');

$I->amOnPage('/about');
$I->canSee('about');