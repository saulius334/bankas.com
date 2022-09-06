<?php

namespace App;

use App\Controllers\HomeController as HomeCon;
use App\Controllers\LoginController as loginCon;

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
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'login') {
            return ((new loginCon)->login());
        }
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'login') {
            return ((new loginCon)->login());
        }
    }
    static public function view($name, $data = []) {
        extract($data);
        require DIR . 'Resources/view/' . $name . '.php';
    }
}