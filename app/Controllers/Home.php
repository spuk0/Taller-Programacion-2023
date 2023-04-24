<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']="principal";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner");
        echo view("front/principal");
        echo view("front/footer");
    }

    public function quienes_somos(){
        $data["title"]="quienes-somos";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/quienesSomos");
        echo view("front/footer");
    }

    public function comercializacion(){
        $data["title"]="comercializacion";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/comercializacion");
        echo view("front/footer");
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
