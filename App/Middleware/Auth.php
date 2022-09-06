<?php

namespace App\Middleware;

class Auth {
    static public function validate() {
    
    }
    static public function isLogged() : bool {
        return (isset($_SESSION['login']) && $_SESSION['login'] == 1);
    }
}