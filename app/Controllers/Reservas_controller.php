<?php
namespace App\Controllers;
use App\Models\Reservas_model;
use App\Models\Tipo_reserva_model;
use App\Models\Usuarios_model;
use App\Models\Ventas_detalle_model;
use App\Models\Factura_model;
use CodeIgniter\Controller;

class Reservas_controller extends Controller {

    public function __construct() {
        helper(['form', 'url']);
    }

    //Mostrar los productos en la lista
    public function index(){
        $reservaModel = new Reservas_model();
        $listaReservasDisponibles['reservas'] = $reservaModel->orderBy('id', 'ASC')->findAll();

        $data['title']="Plaza Hotel en Corrientes - Ver habitaciones para reservar";
        $data['bannerimg']="assets/img/hotel/timbre.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $data);
        echo view("back/reservas/reservas_view", $listaReservasDisponibles);
        echo view("front/footer");
    }

    public function crearReservas(){
   
        $tipoReservaModel = new Tipo_reserva_model();
         // traer todos los tipos de reserva desde la db
        $tiposReservas['tipos'] = $tipoReservaModel->getTipoReserva();
     
         $reservasModel = new Reservas_model();
       
         $data['title']="Plaza Hotel en Corrientes - creando usuario";
         $data['bannerimg']="assets/img/hotel/timbre.jpg";
         echo view("front/head", $data);
         echo view("front/navbar");
         echo view("front/banner", $data);
         echo view("back/reservas/crearReserva_view", $tiposReservas);
         echo view("front/footer");
     }

     public function store() {
        $input = $this->validate([
                         
             'nombreReserva' =>'required|min_length[2]',
             'precio'  => 'required',
             'precio_vta'  => 'required',
             'stock'  => 'required',
             'stock_min' => 'required'
           ]);
  
         if (!$input) {
                $data['title']="Plaza Hotel en Corrientes - creando usuario";
                $data['bannerimg']="assets/img/hotel/timbre.jpg";
                echo view("front/head", $data);
                echo view("front/navbar");
                echo view("front/banner", $data);
                echo view('back/reservas/crearReserva_view', [
                 'validation' => $this->validator
             ]);
                echo view("front/footer");
         } else {
            
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

              $data = [
                   'nombreReserva' => $this->request->getVar('nombreReserva'),
                   'descripcionReserva' => $this->request->getVar('descripcionReserva'),
                   'imagen' => $img->getName(),
                    'tipo_id' => $this->request->getVar('tipo_id'),
                    'precio' => $this->request->getVar('precio'),
                    'precio_vta' => $this->request->getVar('precio_vta'),
                    'stock' => $this->request->getVar('stock'),
                    'stock_min' => $this->request->getVar('stock_min'),
                    'nroHabitacion' => $this->request->getVar('nroHabitacion'),
                     //'eliminado' => NO
            ];
           
              $reservasModel = new Reservas_model();
              $reservasModel->insert($data);
               return $this->response->redirect(site_url('/crearReserva'));
        }
   }

    // show single producto
    public function unaReserva ($id = null){
        
        $reservaModel = new Reservas_model();
        $data['reserva'] = $reservaModel->where('id', $id)->first();
         // instancio el modelo de categorias
        //$tipoReservaModel = new Tipo_reserva_model();
        // traer todas las categorias desde la db
        //$tipoReserva['tiposReserva'] = $tipoReservaModel->getTipoReserva();
        
        $data['title']="Plaza Hotel en Corrientes - crud de reservas";
        $bannerImg['bannerimg']="../assets/img/hotel/timbre.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $bannerImg);
        echo view('back/reservas/editReserva_view', $data);
        echo view("front/footer");
    }

        // update de productos (modificacion)
    public function modificar($id){
        $reservaModel = new Reservas_model();
        $id = $reservaModel->where('id', $id)->first(); 
         $img = $this->request->getFile('imagen');
         $nombre_aleatorio = $img->getRandomName();
         $img->move(ROOTPATH.'assets/uploads',$nombre_aleatorio);

         //$reservaModel->update($id, ['imagen' => $nombre_aleatorio)]);

         $data = [
                   'nombreReserva' => $this->request->getVar('nombreReserva'),
                   'descripcionReserva' => $this->request->getVar('descripcionReserva'),
                    'imagen' => $img->getName(),
                    // completar con los demas campos
                    'tipo_id' => $this->request->getVar('tipo_id'),
                    'precio' => $this->request->getVar('precio'),
                    'precio_vta' => $this->request->getVar('precio_vta'),
                    'stock' => $this->request->getVar('stock'),
                    'stock_min' => $this->request->getVar('stock_min'),
                    'nroHabitacion' => $this->request->getVar('nroHabitacion'),
                   // 'eliminado' => 'NO',
            ];
        
            $reservaModel->update($id, $data);
            return $this->response->redirect(site_url('/reservas-list'));
    } 
    //eliminar lógicamente 
    public function borrarReserva($id){
        $reservaModel = new Reservas_model();
        $data['eliminada'] = $reservaModel->where('id', $id)->first();
        $data['eliminada'] = 'SI';
        $reservaModel->update($id, $data);
        return $this->response->redirect(site_url('/reservas-list'));
    }

    public function listaReservasEliminadas() {
        $reservaModel = new Reservas_model();
        $dato['reservas'] = $reservaModel->orderBy('id', 'DESC')->findAll();

        $data['title']="Plaza Hotel en Corrientes - crud de reservas";
        $bannerImg['bannerimg']="assets/img/hotel/timbre.jpg";
        echo view("front/head", $data);
        echo view("front/navbar");
        echo view("front/banner", $bannerImg);
        echo view('back/reservas/reservas_eliminadas', $dato);
        echo view("front/footer");
  }

    public function activarReserva($id) {
        $reservaModel = new Reservas_model();
        $data['eliminada'] = $reservaModel->where('id', $id)->first();
        $data['eliminada'] = 'NO';
        $reservaModel->update($id, $data);
        return $this->response->redirect(site_url('/reservasEliminadas'));
    }

    public function listar_ventas() { 
        
        $dato = array('titulo' => 'Ventas');
        $reservaModel = new Reservas_model();
        $reservaModel = $reservaModel->findAll(); //trae todas las reservas
        $query=  $reservaModel->join('reservas', 'reservas.tipo_id=tipos.id'); //Trae las reservas segun su tipo.
        $query   = $reservaModel->get();

        // return json_encode($query->getResult());
        // $reservaModel = new Reservas_model();
        $facturas = new Factura_model();
        $data = array('factura' => $this->Reservas_model->getFactura());

          echo view('front/head_view_crud',$dato);
          echo view('front/nav_view');
          echo view('back/productos/muestraventas', $facturas);
          echo view('front/footer_view');
    }

    //sin usar
    public  function muestra_detalle($id) {
        if($this->_veri_log()){ //verificar login
            $data = array('titulo' => 'Detalle');
    
            $session_data = $this->session->userdata('logged_in');
            $data['perfil_id'] = $session_data['perfil_id'];
            $data['nombre'] = $session_data['nombre'];

            $reservaModel = new Reservas_model();
                        
            $dat = array('ventas_detalle' => $this->reservaModel->getDetalles($id));

            $this->load->view('front/head_view', $data);
            $this->load->view('front/menu_view2', $data);
            $this->load->view('productos/muestradetalle', $dat);
            $this->load->view('front/footer_view');
        }else{
            redirect('login', 'refresh');
        }
    }
}