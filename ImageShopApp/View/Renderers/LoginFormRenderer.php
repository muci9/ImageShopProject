<?php


namespace ImageShopApp\View\Renderers;


class LoginFormRenderer implements IRenderer
{
    public function render(array $errors = null): void
    {
        require_once "ImageShopApp/View/Templates/header.php";
        require_once "ImageShopApp/View/Templates/login-form.php";
    }
}