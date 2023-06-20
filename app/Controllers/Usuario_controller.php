<?php
namespace App\Controllers;
use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller{
  
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
          $data = ['baja' => 'SI'];
          $data['user'] = $userModel->where('id', $id)->update($id, $data);
          return $this->response->redirect(site_url('/users-list'));
      }    
}
