<?php

namespace app\view;
class RegisterFormView
{
    public static function render($data)
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/');
        $twig =  new \Twig\Environment($loader);


        echo $twig->render('user/register.twig',$data);
    }
}
