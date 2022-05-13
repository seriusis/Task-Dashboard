<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;

class UserModel extends BaseModel {

    public function __construct()
    {
        parent::__construct('user');
    }

    public function getAuth($email, $password){
        $db = Capsule::table($this->table)
        ->where(['email' => $email, 'password' => md5($password)])
        ->get()
        ->pop();

        return $db;
    }


}