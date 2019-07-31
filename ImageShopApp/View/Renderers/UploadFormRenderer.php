<?php

namespace ImageShopApp\View\Renderers;


class UploadFormRenderer implements IRenderer
{
    private $tags;

    public function __construct(array $tags)
    {
        $this->tags = $tags;
    }

    public function render() : void
    {
        $tagCollection = $this->tags;
        require_once "ImageShopApp/View/Templates/upload-form.php";
    }
}