<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\Product;

class ProductController
{
    public static function showProducts() {
        $itemCollection = [
            new Product("a", "a", "a", "a", "a", "a"),
            new Product("b","b","b","b","b","b")
            ];
        require_once "/home/ciprianmuresan/PhpstormProjects/ImageShopWebsite/ImageShopApp/View/Templates/home-page.php";
    }
}