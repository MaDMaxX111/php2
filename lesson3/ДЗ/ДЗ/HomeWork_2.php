<?php

trait ForSingleton {
    
    private function __construct() {  }
    private function __clone() {  }
    private function __wakeup() {  }
    
    public static function getInstance() {
        if ( empty(self::$instance) ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function doAction() { echo "Singleton"; }

}

class Singleton {
    
    private static $instance;
    
    use ForSingleton;

}

$obj_1 = Singleton::getInstance();
$obj_2 = Singleton::getInstance();

var_dump($obj_1 === $obj_2);    // Same object


?>
