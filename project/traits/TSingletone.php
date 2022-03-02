<?php

namespace app\traits;

trait TSingletone
{
    private static $instanse = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance()
    {
        if(is_null(static::$instanse)) {
            static::$instanse = new static();
        }

        return static::$instanse;
    }
}