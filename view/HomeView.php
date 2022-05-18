<?php
namespace app\view;
class HomeView extends BaseView {

    public static function render(array $data):void{
        parent::baseRender('home/home.twig', $data);
    }
}