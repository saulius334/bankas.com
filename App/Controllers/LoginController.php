<?php

namespace App\Controllers;

use App\App;
use App\DB\Json;
use App\Services\Messages;

class LoginController {
    public function login() {
        $title = 'Login';
        Json::connect();
        return App::view('login', ['title' => $title]);
    }
    public function doLogin() {
        $users = Json::connect('user')->showAll();
        foreach ($users as $user) {
            if($user['email'] == $_POST['email']) {
                if ($user['password'] == $_POST['password']) {
                    $_SESSION['login'] = 1;
                    $_SESSION['player'] = $user;
                    //Messages::
                    return App::view('main');
                }
            }
        }
        return App::redirect('login');
    }
    public function logout() {
        unset($_SESSION['login'], $_SESION['player']);
        //Messages::
        return header('Location: http://bankas.com');
    }
}