<?php

namespace App\Controllers;
use App\App;
use App\DB\Json;
use App\Services\Msg;

class HomeController {
    public function home() {
        $title = 'Welcome';
        return App::view('home', ['title' => $title]);
    }
    public function register() {
        $title = 'Register new User';
        return App::view('user_create', ['title' => $title]);
    }
    public function doRegister() {
        Json::connect('user')->create([
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'password' => $_POST['password'],
            'superAdmin' => isset($_POST['super']) ? 1 : 0
        ]);
        //Msg::showMsg();
        return App::redirect('home');
    }
    public function main() {
        $title = 'Main';
        return App::view('main', ['title' => $title]);
    }
}