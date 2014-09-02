<?php 
$I = new AcceptanceTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the homepage loads.');

$I->amOnPage('/');
$I->canSee('Right Now');