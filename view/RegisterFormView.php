<?php

namespace app\view;
class RegisterFormView extends BaseView
{
    public static function render(array $data):void
    {
        parent::baseRender('user/register.twig',$data);
    }
}
