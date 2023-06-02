<?php 
namespace App\Controllers;
  
use CodeIgniter\Controller;
  
class Panel_controller extends Controller
{
    public function index()
    {

        $session = session();
        $nombre=$session->get('usuario');
        $perfil=$session->get('perfil_id');
          
        
        $data['perfil_id']=$perfil;     
        $data["title"]="Acerca de Corrientes Plaza Hotel, Login form";
        $data['bannerimg']="assets/img/hotel/pasillo.jpg";
        echo view('front/head',$data);
        echo view('front/navbar');
        echo view("front/banner", $data);
        echo view ('back/login/login2',$data);
        echo view('front/footer');       
     }
}
