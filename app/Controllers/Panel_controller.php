<?php 
namespace App\Controllers;
  
use CodeIgniter\Controller;
  
class Panel_controller extends Controller
{
    public function index()
    {
        $session = session(); //Sesion iniciada.
        $nombre=$session->get('usuario'); //Nombre del usuario que inicio sesion guardada como variable.
        $perfil=$session->get('perfil_id');//Id del usuario que inicio sesion guardada como variable.
        $data['perfil_id']=$perfil;    
        $data['nombre']=$nombre; 
        $dato["title"]="Acerca de Corrientes Plaza Hotel, Perfil form";
        $datoo['bannerimg']="assets/img/hotel/pasillo.jpg";
        echo view('front/head',$dato);
        echo view('front/navbar');
        echo view("front/banner", $datoo);
        if(session()->perfil_id == 1){
            echo view ('back/usuario/panelAdmin', $data); //Conexion de la varialbe con el nombre y el id.
        }else{
            echo view('back/usuario/panelUsuario', $data);
        }
        echo view('front/footer');       
     }
}
