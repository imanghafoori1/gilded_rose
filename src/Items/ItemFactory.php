<?php

class ItemFactory
{
    private static $map = [];

    /**
     * @param string $name
     * @param array $params
     * @return mixed
     */
    public static function makeItemObj(string $name, array $params) : Item
    {
        $class = self::$map[$name];

        return new $class(...$params);
    }


    public static function instance($key, $class){
        self::$map[$key] = $class;
    }
}