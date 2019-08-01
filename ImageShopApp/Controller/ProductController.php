<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\Product;
use ImageShopApp\Model\Persistence\Finder\ProductFinder;
use ImageShopApp\Model\Persistence\Finder\TagFinder;
use ImageShopApp\Model\Persistence\PersistenceFactory;
use ImageShopApp\View\Renderers\UploadFormRenderer;

class ProductController
{
    private $params;

    public function __construct(array $params = null)
    {
        $this->params = $params;
    }

    public function show() {
        $productFinder = PersistenceFactory::createFinder("Product");
        /**
         * @var ProductFinder $productFinder
         */
        $productCollection = $productFinder->findAllProducts();
        require_once "ImageShopApp/View/Templates/home-page.php";
    }

    public static function uploadProduct() {
        $tagFinder = PersistenceFactory::createFinder("Tag");
        /**
         * @var TagFinder $tagFinder
         */
        $tagCollection = $tagFinder->findAllTags();
        $formRenderer = new UploadFormRenderer($tagCollection);
        $formRenderer->render();
    }

    public static function postUpload() {
        //TODO
        // validate form, save image, create tiers, redirect to home-page
    }
}