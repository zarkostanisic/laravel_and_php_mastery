<?php

class MathUtils {
    public static float $pi = 3.14159;

    public static function square(float $num): float {
        return $num * $num;
    }
}

var_dump(
    MathUtils::$pi,
    MathUtils::square(5.0)
);

// The Connection class implements the singleton pattern
class Connection {
    private static $instance = null;
    private function __construct() {
        // Private constructor to prevent instantiation
    }

    public static function singleton() {
        if(static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}

$connection = Connection::singleton(); // This will create a singleton instance

// My example of singleton pattern
class a {
    private static $ins = null;

    private function __construct() {}

    public static function sing() {
        if(static:: $ins === null){
            static::$ins = new static();
        }

        return static::$ins;
    }
}

var_dump(
    a::sing()
);