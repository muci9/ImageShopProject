<?php

require_once "vendor/autoload.php";
$config = require 'config.php';
$request = $_SERVER['REQUEST_URI'];
use ImageShopApp\Controller\ProductController;

switch ($request) {
    case '/':
        ProductController::showProducts();
        break;
    case '/product/upload':
        ProductController::uploadProduct();
        break;
    case '/product/show':
        break;
}