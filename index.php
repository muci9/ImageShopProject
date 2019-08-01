<?php

require_once "vendor/autoload.php";
$config = require 'config.php';

use ImageShopApp\Routing\FrontController;

$frontController = new FrontController();
$frontController->run();