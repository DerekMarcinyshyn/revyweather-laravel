<?php 
$I = new FunctionalTester($scenario);

$I->am('a human');
$I->wantTo('make sure the homepage works.');

$I->amOnPage('/');
$I->canSee('You have arrived');