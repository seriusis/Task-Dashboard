<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;

class UserModel extends BaseModel {
    private $user_id;
    private $firstname;
    private $lastname;
    private $email;

    public function __construct()
    {
        parent::__construct('user');
        $this->user_id = $_SESSION['user_id'] ?? 0;
        $user_info = $this->getUser();

        $this->id = $user_info->id;
        $this->firstname = $user_info->name;
        $this->lastname = $user_info->lastname;
        $this->email = $user_info->email;
    }

    public function getAuth($email, $password){

        $user_info = Capsule::table($this->table)
        ->where(['email' => $email, 'password' => md5($password)])
        ->get()
        ->pop();
        if($user_info){
            $this->id = $user_info->id;
            $this->firstname = $user_info->name;
            $this->lastname = $user_info->lastname;
            $this->email = $user_info->email;
        }

        return $user_info;
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

    public function delete($id):void{

    }

    public function getUser():mixed{
        return Capsule::table($this->table)
            ->where(['id' => $this->user_id])
            ->get()
            ->pop();
    }

    public function getFullName():string{

        return $this->firstname .' '.$this->lastname;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function getName():string{

        return $this->firstname;
    }


    public function getDashboardsTotal():int{
        return Capsule::table('dashboard')
            ->where(['user_id' => $this->user_id])
            ->get()
            ->count();
    }

    public function getTasksTotal():int{
        return   Capsule::table('dashboard as d')
            ->selectRaw("COUNT(t.id) as total")
            ->leftJoin('task as t','d.id','=','t.dashboard_id')
            ->where(['user_id' => $this->user_id])
            ->get('total')
            ->pop()->total;
    }



}