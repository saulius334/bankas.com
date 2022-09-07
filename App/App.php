<?php

namespace App;

use App\Controllers\HomeController as HomeCon;
use App\Controllers\LoginController as loginCon;
use App\Controllers\UserController as userCon;
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
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'main') { // go to home page
            return ((new HomeCon)->main());
        }
        // register user
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'register') { // can't access register through http
            return ((new HomeCon)->register());
        }
        if ($method == 'POST' && count($url) == 1 && $url[0] == 'register') { // try to register
            if (Auth::validateEmail()) {
                return ((new HomeCon)->doRegister());
            }
            //Messages::
            return self::redirect('');
        }
        //register user end

        //login 
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'login') { // go to login page
            if (Auth::isLogged()) {
                return self::redirect('main');
            }
            return ((new loginCon)->login());
        }
        if ($method == 'POST' && count($url) == 1 && $url[0] == 'login') { // try to log in
            return ((new loginCon)->doLogin());
        }
        if($method == 'POST' && count($url) == 1 && $url[0] == 'logout') {
            return((new loginCon)->logout());
        }
        
        //login end

        //new client
        if ($method == 'GET' && count($url) == 2 && $url[0] == 'user' && $url[1] == 'create') { // try to create new user
            return ((new UserCon)->createpage());
        }
        if ($method == 'POST' && count($url) == 2 && $url[0] == 'user' && $url[1] == 'create') { // try to create new user
            return ((new UserCon)->store());
        }

        //client register end
    }






    static public function view($name, $data = []) {
        extract($data);
        require DIR . 'Resources/view/' . $name . '.php';
    }
    static public function redirect($where = '') {
        if (Auth::isLogged()) {
            header('Location: ' . URL . $where);
        }
        return self::redirect('');
    }
}