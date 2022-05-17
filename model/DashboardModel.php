<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;


class DashboardModel extends BaseModel{
    public function __construct()
    {
        parent::__construct('dashboard');
    }


    public function getUserDashboards(){
        return Capsule::table($this->table)
            ->select(['id', 'name', 'date'])
            ->where('user_id','=',$_SESSION['user_id'])
            ->get()->all();
    }
}
