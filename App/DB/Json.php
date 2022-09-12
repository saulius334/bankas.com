<?php

namespace App\DB;

class Json implements DataBase {

    private $data, $file;
    static private $obj;

    static public function connect($file = 'data') {
        return self::$obj ?? self::$obj = new self($file);
    }

    private function __construct($file) {
        $this->file = $file;
        if (!file_exists(DIR . 'App/DB/' . $this->file . '.json')) {
            file_put_contents(DIR . 'App/DB/' . $this->file . '.json', json_encode([]));
        }
        $this->data = json_decode(file_get_contents(DIR . 'App/DB/' . $this->file . '.json'), 1);
    }
    private function getId() : int {
        if (!file_exists(DIR . 'App/DB/' . $this->file . '_id.json')) {
            file_put_contents(DIR . 'App/DB/' . $this->file . '_id.json', json_encode(0));
        }
        $id = json_decode(file_get_contents(DIR . 'App/DB/' . $this->file . '_id.json'));
        $id++;
        file_put_contents(DIR . 'App/DB/' . $this->file . '_id.json', json_encode($id));
        return $id;
    }
    public function __destruct() {
        file_put_contents(DIR . 'App/DB/' . $this->file . '.json', json_encode($this->data));
    }
    function create(array $userData) : void {
        $userData['id'] = $this->getId();
        $this->data[] = $userData;
    }
 
    public function update(int $userId, array $userData) : void {
        foreach ($this->data as &$value) {
            if($value['id'] == $userId) {
                $userData['id'] = $userId;
                $value = $userData;
                break;
            }
        }
    }
 
    public function delete(int $userId) : void {
    foreach ($this->data as $index => $value) {
        if ($value['id'] == $userId) {
            unset($this->data[$index]);
            $this->data = array_values($this->data);
            break;
        }
    }
    }
 
    public function show(int $userId) : array {
    foreach ($this->data as $value) {
        if ($value['id'] == $userId) {
            return $value;
        }
    }
    }
    
    function showAll() : array {
        return $this->data;
    }
    public function updateJustOne(int $userId, $what, $bywhat) : void {
        $what = "'" . $what . "'"; 
        foreach ($this->data as &$value) {
            if($value['id'] == $userId) {
                $userData['id'] = $userId;
                $value[$what] = $bywhat;
                break;
            }
        }
    }
}