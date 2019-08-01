<?php


namespace ImageShopApp\View\Renderers;


class LoginFormRenderer implements IRenderer
{
    public function render(): void
    {
        require_once "ImageShopApp/View/Templates/login-form.php";
    }
}