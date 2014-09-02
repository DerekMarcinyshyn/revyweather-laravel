<?php 
$I = new FunctionalTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the homepage loads.');

$I->amOnPage('/');
$I->see('Courthouse Area Revelstoke', 'h3');