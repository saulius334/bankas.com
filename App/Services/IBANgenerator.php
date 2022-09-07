<?php

namespace App\Services;

class IBANgenerator {

static function IBAN_generator() : string {

    $template = 'LT';
    $template2 = '000101';
    for ($i=0; $i < 10; $i++) { 
        if ($i != 3) {
            $template = $template . rand(0,9);
        }
        $template = $template . $template2;
    }
    return $template;
} 
}