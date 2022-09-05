<?php

namespace App;

use App\Controllers\HomeController as HomeCon;

class App {
    static public function start() {
        self::router();
    }
    static public function router() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        array_shift($url);
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method == 'GET' && count($url) == 1 && $url[0] == '') {
            return ((new HomeCon)->home());
        }
    }
}