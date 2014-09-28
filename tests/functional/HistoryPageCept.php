<?php
$I = new FunctionalTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the history page loads');

$I->amOnPage('/history');
$I->see('select dates');
