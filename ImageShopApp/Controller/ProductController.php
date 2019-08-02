<?php


namespace ImageShopApp\Controller;


use ImageShopApp\Model\DomainObject\Product;
use ImageShopApp\Model\Persistence\Finder\ProductFinder;
use ImageShopApp\Model\Persistence\Finder\TagFinder;
use ImageShopApp\Model\Persistence\PersistenceFactory;
use ImageShopApp\View\Renderers\HomepageRenderer;
use ImageShopApp\View\Renderers\ProductDetailRenderer;
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
        $renderer = new HomepageRenderer();
        $renderer->render($productCollection);
    }

    public static function uploadProduct() {
        $tagFinder = PersistenceFactory::createFinder("Tag");
        /**
         * @var TagFinder $tagFinder
         */
        $tagCollection = $tagFinder->findAllTags();
        $formRenderer = new UploadFormRenderer();
        $formRenderer->render($tagCollection);
    }

    public function detail()
    {
        $productFinder = PersistenceFactory::createFinder("product");
        /**
         * @var ProductFinder $productFinder
         */
        if (!isset($this->params['id']))
            $this->params['id'] = 1;
        $product = $productFinder->findProductById((int)$this->params['id']);
        $renderer = new ProductDetailRenderer();
        $renderer->render($product);
    }

    public static function postUpload() {
        //TODO
        // validate form, save image, create tiers, redirect to home-page
    }
}