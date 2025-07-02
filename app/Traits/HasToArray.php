<?php

namespace App\Traits;

use ReflectionClass;
use ReflectionException;

trait HasToArray
{
    /**
     * @throws ReflectionException
     */
    public static function fromArray(array $array) : static
    {
        $reflection = new ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new static();
        }

        $parameters = $constructor->getParameters();

        $args = [];

        foreach ($parameters as $parameter) {
            $name = $parameter->getName();
            $args[] = $array[$name] ?? $parameter->getDefaultValue();
        }

        return $reflection->newInstanceArgs($args);
    }
}
