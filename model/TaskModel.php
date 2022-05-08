<?php

namespace app\model;
use Illuminate\Database\Capsule\Manager as Capsule;

class TaskModel extends BaseModel{
//    private $id;
//    private $name;
//    private $text;
//    private $status;


    public function __construct()
    {
        parent::__construct('task');
    }


    public function getAll()
    {
        $db = Capsule::table($this->table)->orderBy('sort_order');
        return $db->get()->all();
    }


    public function create($data)
    {
        Capsule::table($this->table)->insert([
            'name' => $data['name'],
            'text' => $data['text'],
            'mark' => $data['mark'],
            'status' => $data['status'],
            'date' => date('Y-m-d H:i:s'),
            'sort_order' => $data['sort_order']
        ]);
    }

    public function update($data)
    {
        Capsule::table($this->table)->where('id','=',$data['id'])->update([
            'name' => $data['name'],
            'text' => $data['text'],
            'mark' => $data['mark'],
            'status' => $data['status'],
            'sort_order' => $data['sort_order']
        ])
        ;
    }

}
