<?php

namespace ImageShopApp\View\Renderers;


class UploadFormRenderer implements IRenderer
{
    public function render($tagCollection) : void
    {
        require_once "ImageShopApp/View/Templates/header.php";
        require_once "ImageShopApp/View/Templates/upload-form.php";
    }
}