<?php

namespace App\Controllers;
use App\App;
use App\DB\Json;

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
            'member' => isset($_POST['member']) ? 1 : 0
        ]);
        return App::redirect('');
    }
    public function main() {
        $title = 'Main';
        return App::view('main', ['title' => $title]);
    }
}