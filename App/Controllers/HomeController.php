<?php

namespace App\Controllers;
use App\App;
use App\DB\Json;

class HomeController {
    public function home() {
        
        $title = 'Home';
        return App::view('home', ['title' => $title]);
    }
}