<?php

namespace App;

use App\Controllers\HomeController as HomeCon;
use App\Controllers\LoginController as loginCon;
use App\Middleware\Auth;

class App {
    static public function start() {
        session_start();
        self::router();
    }
    static public function router() {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        array_shift($url);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET' && count($url) == 1 && $url[0] == '') { // go to home page
            return ((new HomeCon)->home());
        }
        // register user
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'register') { // go to register page
            return ((new HomeCon)->register());
        }
        if ($method == 'POST' && count($url) == 1 && $url[0] == 'register') { // try to register
            if (Auth::validate()) {

            }
            return ((new HomeCon)->doRegister());
        }


        //login 
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'login') { // go to login page
            return ((new loginCon)->login());
        }
        if ($method == 'POST' && count($url) == 1 && $url[0] == 'login') { // try to log in
            return ((new loginCon)->doLogin());
        }
        
        //login end
    }






    static public function view($name, $data = []) {
        extract($data);
        require DIR . 'Resources/view/' . $name . '.php';
    }
    static public function redirect($where) {
        header('Location: ' . URL . $where);
    }
}