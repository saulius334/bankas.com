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
}