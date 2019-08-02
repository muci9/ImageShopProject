<?php


namespace ImageShopApp\View\Renderers;


class RegisterFormRenderer implements IRenderer
{
    public function render($errors = null): void
    {
        require_once "ImageShopApp/View/Templates/header.php";
        require_once "ImageShopApp/View/Templates/register-form.php";
    }
}