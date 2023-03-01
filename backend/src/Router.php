<?php

use DIContainer\Container;

class Router
{
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';

    private const ADMIN_URI = '/admin/';

    private array $handlers = [];

    protected Container $pageControllersContainer;

    public function __construct()
    {
        $this->pageControllersContainer = new Container();
    }

    public function get(string $path, $class, string $handler)
    {
        $this->pageControllersContainer->createController($class);
        $this->addHandler(self::METHOD_GET, $path, $handler, $class);
    }

    public function post(string $path, $class, string $handler)
    {
        $this->addHandler(self::METHOD_POST, $path, $handler, $class);
    }

    private function addHandler(string $method, $path, $handler, $class)
    {
        $this->handlers[$method . $path] = [
            'path' => self::ADMIN_URI . $path,
            'method' => $method,
            'handler' => $handler,
            'class' => $class
        ];
    }

    public function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];

        $method = $_SERVER['REQUEST_METHOD'];
        $notFound = true;

        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $requestPath && $method === $handler['method']) {
                $notFound = false;

                $reflectionMethod = new ReflectionMethod($handler['class'], $handler['handler']);
                $params = $this->pageControllersContainer->getParamsArray($reflectionMethod);

                call_user_func_array(array($handler['class'], $handler['handler']), $params);
                //call_user_func(array($handler['class'], $handler['handler']));
            }
        }

        if ($notFound){
            print("Not found");
        }
    }
}