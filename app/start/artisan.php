<?php

Artisan::resolve('ForecastioRevelstokeCommand');
Artisan::resolve('GetCourthouseCommand');
Artisan::resolve('EnvironmentCanadaRevelstokeCommand');
Artisan::resolve('CourthouseImageCommand');
Artisan::add(new SensioLabs\Security\Command\SecurityCheckerCommand(new SensioLabs\Security\SecurityChecker));