<?php

class transportCompanyFactory {
    static public function __callStatic(string $name, array $arguments)
    {
        if (class_exists($name)) {
            return new $name($arguments);
        }
    }
}