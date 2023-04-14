<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']="principal";
        echo view("plantillaBootstrap", $data);
    }
}

/*
    public function index(){
        $data['title']='principal';
        echo view("front/head_view", $data);
        echo view("front/nav_view");
        echo view("front/prueba");
        echo view("front/footer_view");
    }

 */
