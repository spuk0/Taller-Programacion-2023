<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title']="Plaza Hotel en Corrientes - Principal";
        $data['bannerimg']="assets/img/hotel/timbre.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/principal");
        echo view("front/footer");
    }

    public function quienes_somos(){
        $data["title"]="Acerca de Corrientes Plaza Hotel, quienes somos";
        $data['bannerimg']="assets/img/hotel/pasillo.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/quienesSomos");
        echo view("front/footer");
    }

    public function comercializacion(){
        $data["title"]="Corrientes Plaza Hotel comercializacion y servicios";
        $data['bannerimg']="assets/img/hotel/habitacion1.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/comercializacion");
        echo view("front/footer");
    }

    public function contacto(){
        $data["title"]="Corrientes Plaza Hotel contacto y forma de contacto";
        $data['bannerimg']="assets/img/hotel/portada.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/contacto");
        echo view("front/footer");
    }

    public function terminosYUsos(){
        $data["title"]="Corrientes Plaza Hotel terminos y usos";
        $data['bannerimg']="assets/img/hotel/sala-estar3.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/terminosYUsos");
        echo view("front/footer");
    }
}
