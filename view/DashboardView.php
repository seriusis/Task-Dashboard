<?php

namespace app\view;

use Illuminate\Contracts\Console\Application;

class DashboardView extends BaseView{
    public static function renderOne(array $data):void{
        parent::baseRender('dashboard/one.twig', $data);
    }

    public static function renderAll(array $data):void{
        parent::baseRender('dashboard/list.twig', $data);
    }
}