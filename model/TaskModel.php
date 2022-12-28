<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;

class TaskModel extends BaseModel{
//    private $id;
//    private $name;
//    private $status;


    public function __construct()
    {
        parent::__construct('task');
    }



    public function getById($id){
        return Capsule::table($this->table)
            ->where($this->id_column,'=',$id)
            ->get()
            ->map(function ($item){
                $item->checklist = unserialize($item->checklist ?? '');
                return $item;
            })
            ->pop();

    }

    public function getByDashboard($id)
    {
        $db = Capsule::table($this->table)
            ->where('dashboard_id','=',$id)
            ->orderBy('sort_order');
        return $db->get()
            ->map(function ($item){
                $item->checklist = unserialize($item->checklist ?? '');
                return $item;
            })
            ->all();
    }


    public function create($data)
    {
        Capsule::table($this->table)->insert([
            'name' => $data['name'] ?: 'task
//    private $text;',
            'text' => $data['text'],
            'checklist' => serialize($data['checklist']),
            'mark' => $data['mark'],
            'status' => $data['status'],
            'date' => date('Y-m-d H:i:s'),
            'sort_order' => $data['sort_order'],
            'dashboard_id' => $data['dashboard_id']
        ]);
    }

    public function update($data)
    {
        Capsule::table($this->table)->where('id','=',$data['id'])->update([
            'name' => $data['name'] ?: 'task',
            'text' => $data['text'],
            'checklist' => serialize($data['checklist']),
            'mark' => $data['mark'],
            'status' => $data['status'],
            'sort_order' => $data['sort_order']
        ])
        ;
    }

}
