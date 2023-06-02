<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller{

  public function __construct(){
    helper(['form', 'url']);

}

  //Muestra lista de usuarios
  public function index(){
    $usuariosModel = new Usuarios_model(); //variable con el modelo de tabla de usuarios
    $data['users'] = $usuariosModel->orderBy('id', 'ASC')->findAll();
    $data['title']="Plaza Hotel en Corrientes - Ver usuarios";
    $data['bannerimg']="assets/img/hotel/timbre.jpg";
    echo view("front/head", $data);
    echo view("front/navbar");
    echo view("front/banner", $data);
    echo view("back/usuario/usuarios_view", $data);
    echo view("front/footer");
  }

      // show single user
      public function singleUser($id = null){
        $userModel = new Usuarios_model();
        $data['user'] = $userModel->where('id', $id)->first();
        $data["title"]="Editar un usuario";
        $data['bannerimg']="../assets/img/hotel/comedor2.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("back/usuario/edit_view", $data);
        echo view("front/footer");
    }

  //Form view de agregar usuarios
    public function create() {
        $data["title"]="Corrientes Plaza Hotel reserva, registrate";
        $data['bannerimg']="assets/img/hotel/comedor2.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("back/usuario/registro");
        echo view("front/footer");
      }
    //Agregar en la base de datos
    public function formValidation() {
             
        $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ],
        
       );
        $formModel = new Usuarios_model();
     
        if (!$input) {
                $data["title"]="Corrientes Plaza Hotel reserva, registrate"; 
                echo view('front/head',$data);
                echo view('front/navbar');
                //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                echo view('back/usuario/registro', ['validation' => $this->validator]);
                echo view('front/footer');

        } else {
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

     // update data
     public function update(){
      $userModel = new Usuarios_model();
      $id = $this->request->getVar('id');
      $data = [
          'nombre' => $this->request->getVar('nombre'),
          'email'  => $this->request->getVar('email'),
      ];
      $userModel->update($id, $data);
      return $this->response->redirect(site_url('/users-list'));
      }

      // delete user
      public function delete($id = null){
          $userModel = new Usuarios_model(); //se usa el model que es la tabla.
          $data['user'] = $userModel->where('id', $id)->delete($id);
          return $this->response->redirect(site_url('/users-list'));
      }    
}
