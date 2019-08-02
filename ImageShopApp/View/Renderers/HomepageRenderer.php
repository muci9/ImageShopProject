<?php


namespace ImageShopApp\View\Renderers;


class HomepageRenderer implements IRenderer
{
    public function render($productCollection): void
    {
        require_once "ImageShopApp/View/Templates/header.php";
        require_once "ImageShopApp/View/Templates/home-page.php";
    }
}