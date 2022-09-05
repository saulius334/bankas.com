<?php

namespace App\Controllers;
use App\App;

class HomeController {
    public function home() {
        $title = 'Home';
        return App::view('home', ['title' => $title]);
    }
}