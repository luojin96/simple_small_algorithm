<?php namespace houdunwang\loader;

use houdunwang\loader\build\Base;

class Loader
{
    protected static $link;

    public function __call($method, $params)
    {
        return call_user_func_array([self::single(), $method], $params);
    }

    //生成单例对象
    public static function single()
    {
        if ( ! self::$link) {
            self::$link = new Base();
        }

        return self::$link;
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([static::single(), $name], $arguments);
    }
}