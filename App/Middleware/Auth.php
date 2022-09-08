<?php

namespace App\Middleware;

class Auth {
    static public function validateEmail() {
        return true;
    }
    static public function isLogged() : bool {
        return (isset($_SESSION['login']) && $_SESSION['login'] == 1);
    }
}