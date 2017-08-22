<?php

use Domain\AppSetting;
use LumengPHP\Http\Application;
use LumengPHP\Http\Request;

$rootDir = dirname(__DIR__);

require($rootDir . '/vendor/autoload.php');

$request = Request::createFromGlobals();

$appSetting = new AppSetting();
$configFilePath = $rootDir . '/config/config.php';
$app = new Application($appSetting, $configFilePath);
$app->handle($request);
