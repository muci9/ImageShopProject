<?php

require_once "vendor/autoload.php";
$config = require 'config.php';
$request = $_SERVER['REQUEST_URI'];
use ImageShopApp\Controller\ProductController;
use ImageShopApp\Controller\UserController;

switch ($request) {
    case '/':
        ProductController::showProducts();
        break;
    case '/product/upload':
        ProductController::uploadProduct();
        break;
    case '/product/show':
        break;
    case '/product/post-upload':
        ProductController::postUpload();
        break;
    case '/user/finder':
        UserController::showUser();
        break;
    default:
        echo "Unknown page.";
}