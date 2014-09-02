<?php
$I = new AcceptanceTester($scenario);

$I->am('visitor');
$I->wantTo('make sure the about page loads.');

$I->amOnPage('/about');
$I->canSee('about');