<?php


namespace ImageShopApp\Routing;
use ReflectionClass;

class FrontController implements FrontControllerInterface
{
    const DEFAULT_CONTROLLER = "ProductController";
    const DEFAULT_ACTION = "showProducts";
    const DEFAULT_NAMESPACE = "ImageShopApp\Controller\\";
    const BASE_PATH = "product/show";

    protected $controller = self::DEFAULT_CONTROLLER;
    protected $action = self::DEFAULT_ACTION;
    protected $params = [];

    public function __construct(array $options = [])
    {
        if (empty($options)) {
            $this->parseUri();
            return;
        }
        if (isset($options["controller"])) {
            $this->setController($options["controller"]);
        }
        if (isset($options["action"])) {
            $this->setController($options["action"]);
        }
        if (isset($options["params"])) {
            $this->setController($options["params"]);
        }
    }

    protected function parseUri()
    {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $path = preg_replace('/[^a-zA-Z0-9\/]/', "", $path);
        if ($path === "") {
            $path = self::BASE_PATH;
        }
        // Get rid of @
        @list($controller, $action, $params) = explode("/", $path, 3);
        if (isset($controller)) {
            $this->setController($controller);
        }
        if (isset($action)) {
            $this->setAction($action);
        }
        if (isset($params)) {
            $this->setParams(explode("/", $params));
        }
    }

    public function setController($controller)
    {
        $controller = self::DEFAULT_NAMESPACE.ucfirst(strtolower($controller)) . "Controller";
        if (!class_exists($controller)) {
            throw new \Exception(
                "The action controller '$controller' has not been defined.");
        }
        $this->controller = $controller;
        return $this;
    }

    public function setAction($action) {
        $reflector = new ReflectionClass($this->controller);
        if (!$reflector->hasMethod($action))
        {
            throw new \Exception(
                "The controller action '$action' has been not defined.");
        }
        $this->action = $action;
        return $this;
    }

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    public function run() {
        call_user_func_array(array(new $this->controller, $this->action), $this->params);
    }
}