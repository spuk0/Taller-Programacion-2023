<?php
namespace App\Controllers;
Use App\Models\Reservas_model;
Use App\Models\Tipo_reserva_model;
use CodeIgniter\Controller;

class ReservaCatalogo_controller extends Controller
{

    public function __construct(){
        helper(['url', 'form']);
        //$db = \Config\Database::connect();
                     
    }

    public function index()
    {
        $reservaModel = new Reservas_model();
        $data['reservas'] = $reservaModel->where('eliminada', 'NO')->findAll();
        
        $tipoModel = new Tipo_reserva_model();
        $data['tipos'] = $tipoModel->orderBy('id', 'DESC')->findAll();

        $data['title']="Plaza Hotel en Corrientes - crud de reservas";
        $bannerImg['bannerimg']="assets/img/hotel/timbre.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $bannerImg);
        echo view('front/catalogo_view', $data);
        echo view("front/footer");
    }
}