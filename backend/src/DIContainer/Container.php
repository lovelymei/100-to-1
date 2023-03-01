<?php

namespace DIContainer;

class Container implements IContainer
{
    public function createController($controllerClass)
    {
        $this->bind($controllerClass, function () use ($controllerClass) {
            return new $controllerClass();
        });
    }

/*    public function get($key)
    {
        if (!array_key_exists($key, $this->registry)) {
            throw new \Exception("No {$key} is bound into the container.");
        }

        return $this->registry[$key]($this);
    }*/

    public function getParamsArray($method)
    {
        $params = [];
        foreach ($method->getParameters() as $paramName) {
            $paramTypeName = $paramName->getType()->getName();
            $obj = new $paramTypeName();
            $params[] = $obj;
        }
        return $params;
    }

    private function bind($key, callable $factory)
    {
        $this->registry[$key] = $factory;
    }
}