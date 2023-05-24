<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuarios_model;
  
class Login_controller extends BaseController
{
    public function index()
    {
        helper(['form','url']);
      
         $dato['titulo']='login'; 
        echo view('front/head_view',$dato);
        echo view('front/nav_view');
        echo view('back/login/login');
        echo view('front/footer_view');
    } 
  
    public function auth()
    {
        $session = session();
        $model = new Usuarios_model();
        //traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        
        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['pass'];
               $ba= $data['baja'];
                if ($ba == 'SI'){
                     $session->setFlashdata('msg', 'usuario dado de baja');
                     return redirect()->to('/login_controller');
                 }
                    //Se verifican los datos ingresados para iniciar, si cumple la verificaciòn inicia la sesion
               $verify_pass = password_verify($password, $pass);
                   //password_verify determina los requisitos de configuracion de la contraseña
                   if($verify_pass){
                     $ses_data = [
                    'id' => $data['id'],
                    'nombre' => $data['nombre'],
                    'apellido'=> $data['apellido'],
                    'email' =>  $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id'=> $data['perfil_id'],
                    'logged_in'  => TRUE
                ];
                  //Se se cumple la verificacion inicia la sesiòn  
                  $session->set($ses_data);

                  session()->setFlashdata('msg', 'Bienvenido!!');
                  return redirect()->to('/panel');
            }else{  
                 //no paso la validaciòn de la password
               $session->setFlashdata('msg', 'Password Incorrecta');
                return redirect()->to('/login_controller');
         }   
        }else{
            $session->setFlashdata('msg', 'No Existe el Email o es Incorrecto');
            return redirect()->to('/login_controller');
      } 
    
  }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/prueba');
    }
} 
