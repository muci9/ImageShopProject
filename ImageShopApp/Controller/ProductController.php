<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\Product;
use ImageShopApp\Model\Persistence\Finder\ProductFinder;
use ImageShopApp\Model\Persistence\PersistenceFactory;

class ProductController
{
    public static function showProducts() {
        $productFinder = PersistenceFactory::createFinder("Product");
        /**
         * @var ProductFinder $productFinder
         */
        $productCollection = $productFinder->findAllProducts();
        require_once "/home/ciprianmuresan/PhpstormProjects/ImageShopWebsite/ImageShopApp/View/Templates/home-page.php";
    }
}