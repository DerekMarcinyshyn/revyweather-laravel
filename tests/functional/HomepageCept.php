<?php 
$I = new FunctionalTester($scenario);

$I->am('a visitor');
$I->wantTo('make sure the homepage loads.');

$I->amOnPage('/');
$I->canSee('Right Now');