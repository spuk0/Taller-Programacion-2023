<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']="Hotel Guarani en Corrientes - Principal";
        $data['bannerimg']="assets/img/hotel/timbre.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/principal");
        echo view("front/footer");
    }

    public function quienes_somos(){
        $data["title"]="quienes-somos";
        $data['bannerimg']="assets/img/hotel/pasillo.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/quienesSomos");
        echo view("front/footer");
    }

    public function comercializacion(){
        $data["title"]="comercializacion";
        $data['bannerimg']="assets/img/hotel/habitacion1.jpg";
        echo view("front/head", $data);
        echo view("front/banner", $data);
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
