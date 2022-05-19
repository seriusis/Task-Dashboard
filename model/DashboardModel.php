<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;


class DashboardModel extends BaseModel{
    public function __construct()
    {
        parent::__construct('dashboard');
    }


    public function getUserDashboards(){
        return Capsule::table($this->table.' as d')
            ->selectRaw('d.id, d.name, d.date, COUNT(t.id) as total')
            ->leftJoin('task as t','d.id','=','t.dashboard_id')
            ->where('d.user_id','=',$_SESSION['user_id'])
            ->groupBy('d.id')
            ->get()->all();
    }

    public function create($data){
        $db = Capsule::table($this->table);
         $last_id = $db->insertGetId([
            'name' => $data['name'] ?: 'board',
            'date' => date('Y-m-d H:i:s'),
            'user_id' => $_SESSION['user_id']
        ]);

        return $last_id;
    }

    public function update($data)
    {
        Capsule::table($this->table)->where('id','=',$data['id'])->update([
           'name' => $data['name']
        ]);
    }

    public function delete(int $id):void{
        Capsule::table('task')->where('dashboard_id','=', $id)->delete();
        Capsule::table($this->table)->delete($id);
    }
}
