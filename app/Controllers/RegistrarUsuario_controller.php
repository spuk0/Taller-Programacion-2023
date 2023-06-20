<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class RegistrarUsuario_controller extends Controller{

  //Muestra lista de usuarios
  public function index()
  {
    helper(['form', 'url']);

    $data["title"]="Corrientes Plaza Hotel reserva, registrate";
    $data['bannerimg']="assets/img/hotel/comedor2.jpg";
    echo view("front/head", $data);
    echo view("front/navbar");
    echo view("front/banner", $data);
    echo view("back/usuario/registro");
    echo view("front/footer");
  }

    //Agregar en la base de datos
    public function formValidation() 
    {
        //Reglas de validacion
        $rules = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]'
        ],
        
       );
     
        if (!$rules) {
                $data["title"]="Corrientes Plaza Hotel reserva, registrate"; 
                echo view('front/head',$data);
                echo view('front/navbar');
                //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                echo view('back/usuario/registro', ['validation' => $this->validator]);
                echo view('front/footer');

        } else {
            $formModel = new Usuarios_model();
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido'=> $this->request->getVar('apellido'),
                'usuario'=> $this->request->getVar('usuario'),
                'email'=> $this->request->getVar('email'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
              //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);  
              //return $this->response->redirect(site_url(''));

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
               session()->setFlashdata('success', 'Usuario registrado con exito');
               return $this->response->redirect(site_url('/registro'));
        }
    }
}
