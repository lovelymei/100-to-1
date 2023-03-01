<?php

namespace DIContainer;

interface IContainer
{
 //   public function get($key);

    public function createController($controllerName);

    public function getParamsArray(ReflectionMethod $method);
}