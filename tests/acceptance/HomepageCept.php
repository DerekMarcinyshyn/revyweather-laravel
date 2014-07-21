<?php 
$I = new AcceptanceTester($scenario);

$I->wantTo('ensure that the homepage works');
$I->amOnPage('/');
$I->see('You have arrived');