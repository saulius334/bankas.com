<?php

namespace App\Controllers;
use App\App;
use App\DB\Json;

class HomeController {
    public function home() {
        
        $title = 'Home';
        return App::view('home', ['title' => $title]);
    }
    public function register() {
        $title = 'Register new User';
        return App::view('user_create', ['title' => $title]);
    }
    public function doRegister() {
        Json::connect()->doRegister([
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'asmenskodas' => $_POST['asmenskodas'],
            'member' => isset($_POST['member']) ? 1 : 0
        ]);
        return App::redirect('');
    }
}