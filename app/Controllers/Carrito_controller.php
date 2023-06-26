<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Reservas_model;
use App\Models\Tipo_reserva_model;
use App\Models\Usuarios_model;
use App\Models\Ventas_detalle_model;
use App\Models\Factura_model;

//namespace CodeIgniterCart;

class carrito_controller extends BaseController{

	public function __construct()
    {
    	helper(['form', 'url','cart']);
      
       $session = session();
       $cart = \Config\Services::cart();
       $cart->contents();
    } 
    
    
	public function catalogo(){
		
     $session=session();
    
		 $dato = array('title' => 'Todos los Productos');
		 $reservaModel = new Reservas_model();
		 $data['reservas'] = $reservaModel->orderBy('id', 'DESC')->findAll();
 
      $bannerImg['bannerimg']="assets/img/hotel/timbre.jpg";
      echo view("front/head", $dato);
      echo view("front/navbar");
      echo view("front/banner", $bannerImg);
      echo view('front/catalogo_view', $data);
      echo view("front/footer");
	
	}
   //muestro el carrito
    public function muestra() {

              
         $session = session();
         $cart = \Config\Services::cart();
         $cart = $cart->contents();
                           
         $dato['title'] = 'Confirmar compra';

          $bannerImg['bannerimg']="assets/img/hotel/timbre.jpg";
          echo view("front/head", $dato);
          echo view("front/navbar");
          echo view("front/banner", $bannerImg);
          echo view('cart/carrito_parte_view');
          echo view("front/footer");

    }
    //agrega items al carrito
  public function add() {

        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
      
        $cart->insert(array(
        'id'      =>  $request->getPost('id'),
        'qty'     =>  1,
        'name'    => $request->getPost('nombreReserva'),
        'price'   => $request->getPost('precio_vta'),
       
        ));
       
        return redirect()->to(base_url('reservaCatalogo'));
    }
  
    public function remove($rowid) {
   
         $cart = \Config\Services::Cart();
         $request = \Config\Services::request();
   //Si $rowid es "all" destruye el carrito
    if ($rowid==="all")
    {
      $cart->destroy();
    }
    else //Sino destruye sola fila seleccionada
    { 
       $cart->remove($rowid);
    }
     // Redirige a la misma página que se encuentra
   return redirect()->back()->withInput();
  }
   
      
  //Actualiza el carrito que se muestra
  public function actualiza_carrito()
    {        
        $cart = \Config\Services::Cart();
     
         $request = \Config\Services::request();
    
          $cart->update(array(
            'id'      => $request->getPost('id'),
            'qty'     =>  1,
            'price'   => $request->getPost('precio_vta'),
            'name'    => $request->getPost('nombreReserva'),
   
    ));
        return redirect()->back()->withInput();
}
    
   	public function carroCompra(){

 		      $session=session();
          $cart = \Config\Services::Cart();

          $reservaModel = new Reservas_model();
          $data['reservas'] = $reservaModel->findAll();
          $data['cart'] = $this->request->getVar('cart');
                  
		      $dato = array('title' => 'Todos los Productos');
		       

          $bannerImg['bannerimg']="assets/img/hotel/timbre.jpg";
          echo view("front/head", $dato);
          echo view("front/navbar");
          echo view("front/banner", $bannerImg);
          echo view('cart/carrito_parte_view', $data);
          echo view("front/footer");
 }    

   public function devolver_carrito(){
        $cart = \Config\Services::cart();
        return $cart->contents();
    }

 public function eliminar_carrito(){
        $cart = \Config\Services::cart();
        $session = session();

        $cart->destroy();
        $session->set('cart', 0);

        return redirect()->to(base_url('muestro'));
    }


 public function borrar_carrito()
{
    $cart = \Config\Services::cart();//para que incluya el $cart
    $cart->destroy();

  return redirect()->to(base_url('carrito-comprar'));

}

public function restar_carrito(){
           $cart = \Config\Services::cart();
            $productos = $cart->contents();
             $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        
        if($cantidad > 1){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad-1
            ));
        }
        return redirect()->back()->withInput();
       // return redirect()->route('panel_carrito');
    }

   public function sumar_carrito(){
        $cart = \Config\Services::cart();

        $cantidad = $cart->getItem($this->request->getGet("id"))["qty"];
        $cantidadMax = $cart->getItem($this->request->getGet("id"))["stock"];
        
        if($cantidad < $cantidadMax){ 
            $cart->update(array(
                "rowid" => $this->request->getGet("id"),
                "qty" => $cantidad+1
            ));
        }
        return redirect()->back()->withInput();
       // return redirect()->route('panel_carrito');
    }

}