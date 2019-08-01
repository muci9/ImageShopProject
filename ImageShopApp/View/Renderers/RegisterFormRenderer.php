<?php


namespace ImageShopApp\View\Renderers;


class RegisterFormRenderer implements IRenderer
{
    public function render(): void
    {
        require_once "ImageShopApp/View/Templates/register-form.php";
    }
}