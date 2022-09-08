<?php

namespace App\Controllers;

use App\App;
use App\DB\Json;
use App\Services\Messages;
use App\Services\IBANgenerator;

class UserController {
    public function createpage() {
        $title = 'New Client';
        return App::view('user_create', ['title' => $title]);
    }
    public function create() {
        return App::view('client_create', ['title' => 'New Client']);
    }
    public function store() {
        Json::connect()->create([
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'identificationnumber' => $_POST['IDnumber'],
            // 'IBAN' => IBANgenerator::IBAN_generator(),
            'VIP' => isset($_POST['VIP']) ? 1 : 0
        ]);
        return App::redirect('main');
    }
    public function edit(int $id) {
        return App::view('client_edit', [
            'title' => 'Client edit',
            'client' => Json::connect()->show($id)
        ]);
    }
    public function list() {
        return App::view('client_list', [
            'title' => 'Clients list',
            'client' => Json::connect()->showAll()
        ]);
    }
    public function update(int $id) {
        Json::connect()->update($id, [
            'identificationnumber' => $_POST['identificationnumber'],
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'VIP' => isset($_POST['VIP']) ? 1 : 0
        ]);
        print_r($_POST['identificationnumber']);
        // return App::redirect('main');
    }
    public function delete(int $id) {
        Json::connect()->delete($id);
        return App::redirect('');
    }
}