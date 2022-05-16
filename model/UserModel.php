<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;

class UserModel extends BaseModel {

    public function __construct()
    {
        parent::__construct('user');
    }

    public function getAuth($email, $password){

        return Capsule::table($this->table)
        ->where(['email' => $email, 'password' => md5($password)])
        ->get()
        ->pop();
    }

    public function register($name, $lastname, $email, $pasword){
        return Capsule::table($this->table)
            ->insert(
                [
                    'name' => $name,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => md5($pasword)
                ]);
    }

    public function isExist($email){
        return Capsule::table($this->table)
            ->where('email','=',$email)
            ->get()
            ->pop();
    }

    public function delete($id){

    }



}