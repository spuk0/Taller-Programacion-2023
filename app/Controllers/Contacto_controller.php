<?php 
namespace App\Controllers;
use App\Models\Contacto_model;
use CodeIgniter\Controller;
  
class Contacto_controller extends Controller
{
    public function index()
    {
        helper(['form', 'url']);

        $data["title"]="Corrientes Plaza Hotel contacto y forma de contacto";
        $data['bannerimg']="assets/img/hotel/portada.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("front/contacto");
        echo view("front/footer");
    }

    public function sendMessage(){
        $model = new Contacto_model();
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $message = $this->request->getVar('message');

        $model->save([
            'name' => $name,
            'email' => $email,
            'message' => $message
        ]);

        return $this->response->redirect(site_url('/contacto'));
    }
}