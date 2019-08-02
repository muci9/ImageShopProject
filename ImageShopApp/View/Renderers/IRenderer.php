<?php

namespace ImageShopApp\View\Renderers;

interface IRenderer
{
    public function render($displayData) : void;
}