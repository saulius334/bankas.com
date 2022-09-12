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
            if (Auth::isLogged()) {
                return self::redirect('main');
            }
            return ((new HomeCon)->home());
        }
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'main') { // go to home page
            return ((new HomeCon)->main());
        }
        // register user
        if ($method == 'GET' && count($url) == 1 && $url[0] == 'register') {
            if (Auth::isLogged()) {
                return self::redirect('main');
            }
            return ((new HomeCon)->register());
        }
        if ($method == 'POST' && count($url) == 1 && $url[0] == 'register') { // try to register
            if (Auth::isLogged()) {
                return self::redirect('main');
            }
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
        if ($method == 'GET' && count($url) == 2 && $url[0] == 'client' && $url[1] == 'create') { // go to new client page
            return ((new UserCon)->create());
        }
        if ($method == 'POST' && count($url) == 2 && $url[0] == 'client' && $url[1] == 'store') { // try to create new user
            return ((new UserCon)->store());
        }
        //client register end
        //client list + edit
        if ($method == 'GET' && count($url) == 2 && $url[0] == 'client' && $url[1] == 'list') { // client list page
            return ((new userCon)->list());
        }
        if($method == 'GET' && count($url) == 3 && $url[0] == 'client' && $url[1] == 'edit') {
            return((new userCon)->edit($url[2]));
        }
        if($method == 'POST' && count($url) == 3 && $url[0] == 'client' && $url[1] == 'update') {
            return((new userCon)->update($url[2]));
        }
        if($method == 'POST' && count($url) == 3 && $url[0] == 'client' && $url[1] == 'delete') {
            return ((new userCon)->delete($url[2]));
        }
        if($method == 'POST' && count($url) == 3 && $url[0] == 'add' && $url[1] == 'money') {
            return ((new userCon)->delete($url[2]));
        }
        //client list + edit end
        else {
            return App::view('404');
        }
    }






    static public function view($name, $data = []) {
        extract($data);
        require DIR . 'Resources/view/' . $name . '.php';
    }
    static public function redirect($where) {
        if (Auth::isLogged()) {
            return header('Location: ' . URL . $where);
        }
        return self::view('');
    }
}