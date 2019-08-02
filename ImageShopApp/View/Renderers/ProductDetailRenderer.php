<?php


namespace ImageShopApp\View\Renderers;


class ProductDetailRenderer implements IRenderer
{

    public function render($product): void
    {
        require_once "ImageShopApp/View/Templates/header.php";
        require_once "ImageShopApp/View/Templates/product-page.php";
    }
}