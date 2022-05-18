<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;


class DashboardModel extends BaseModel{
    public function __construct()
    {
        parent::__construct('dashboard as d');
    }


    public function getUserDashboards(){
        return Capsule::table($this->table)
            ->selectRaw('d.id, d.name, d.date, COUNT(t.id) as total')
            ->leftJoin('task as t','d.id','=','t.dashboard_id')
            ->where('d.user_id','=',$_SESSION['user_id'])
            ->groupBy('d.id')
            ->get()->all();
    }
}
