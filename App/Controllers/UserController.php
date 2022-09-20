<?php

namespace App\Controllers;

use App\App;
use App\DB\Json;
use App\Services\Messages;
use App\Services\IBANgenerator;

class UserController {
    public function create() {
        $title = 'New Client';
        return App::view('client_create', ['title' => $title]);
    }
    public function store() {
        Json::connect()->create([
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'identificationnumber' => $_POST['IDnumber'],
            'money' => 0,
            'IBAN' => IBANgenerator::IBAN_generator(),
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
        $client = Json::connect()->show($id);
        Json::connect()->update($id, [
            'identificationnumber' => $client['identificationnumber'],
            'email' => $_POST['email'],
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'VIP' => isset($_POST['VIP']) ? 1 : 0
        ]);

        return App::redirect('main');
    }
    public function delete(int $id) {
        Json::connect()->delete($id);
        return App::redirect('main');
    }
    public function updateMoneyPage($id) {
        $title = 'Update Money';
        return App::view('client_add_money', [
            'title' => $title,
            'client' => Json::connect()->show($id)
        ]);
    }
    public function updateMoney(int $id) {
        $client = Json::connect()->show($id);
        $maney = $client['money'] + $_POST['money'];
        if ($maney < 0) {
            // Messages::
            return App::redirect('add/money/' . $id);
            
        } else {
        Json::connect()->updateJustOne($id, 'money', $maney);
        return App::redirect('client/list');
        }
    }

}