<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Reservas_model;
use App\Models\Factura_model;
use App\Models\Ventas_detalle_model;
use App\Models\Usuarios_model;


class Ventas_Controller extends Controller
{
    public function __construct() {

        $session=session();
         $cart = \Config\Services::cart();
         $cart->contents();


     }

public function factura($venta_id){



    $detalle_ventas = new Ventas_detalle_model();
    $data['ventaDetalle']=$detalle_ventas->getDetalles($venta_id);
        $dato['titulo']='Factura'; 
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/factura', $data);
        echo view('front/footer_view');
    }


    public function ventas(){
        $session = session();
        $id=$session->get('id');
        $perfil=$session->get('perfil_id');
        if($perfil == '1'){
            $detalle_ventas = new Factura_model();
            $data['ventaDetalle'] = $detalle_ventas ->orderBy('id','DESC')->findall();
            $usuarios_model = new Usuarios_model();
            $data['usuarios'] = $usuarios_model->orderBy('id', 'DESC')->findAll();

            $dato['title']='Ventas'; 
                echo view('front/head_view', $dato);
                echo view('front/nav_view');
                echo view('back/ventas/vista_ventas', $data);
                echo view('front/footer_view');
            } else if ($perfil == '0') {
                $detalle_ventas = new Factura_model();
                $data['ventaDetalle'] = $detalle_ventas->where('usuario_id', $id)->orderBy('id', 'DESC')->findAll();
                $dato['title']="Plaza Hotel en Corrientes - crud de reservas";
                $bannerImg['bannerimg']="assets/img/hotel/timbre.jpg";
                echo view("front/head", $dato);
                echo view("front/navbar");
                echo view("front/banner", $bannerImg);
                echo view('back/Ventas/ventas_view', $data);
                echo view("front/footer");

                
            }
        }



public function comprar_carrito()
{
    $cart = \Config\Services::cart();
    $productos = $cart->contents();
    $request = \Config\Services::request();
    $montoTotal = 0;

    foreach ($productos as $producto) {
        $montoTotal += $producto["price"] * $producto["qty"];
    }

    $ventaCabecera = new Factura_model();
    $id_session=intval(session()->id);

    $fechaActual = date('Y-m-d H:i:s'); // Obtener la fecha actual en el formato deseado

    $idcabecera = $ventaCabecera->insert([
        "total_venta" => $montoTotal,
        "usuario_id" => $id_session,
        "fecha" => $fechaActual // Agregar la fecha actual al array de datos
    ]);
    $ventaDetalle = new Ventas_detalle_model();
    $reservaModel = new Reservas_model();

    foreach ($productos as $producto) {
        $ventaDetalle->insert([
            "venta_id" => $idcabecera,
            "producto_id" => $producto['id'],
            "cantidad" => $producto["qty"],
            "precio" => $producto["price"]
        ]);
        $productStock = $reservaModel->find($producto["id"]); // Obtener los detalles del producto


            $stock = $productStock["stock"]; // Obtener el stock del producto
            // Restar la cantidad del carrito al stock actual
            $newStock = $stock - $producto["qty"];

        $reservaModel->update($producto["id"], ['stock' => $newStock]);
    }
    $cart->destroy();
    session()->setFlashdata('success', 'Gracias por tu compra!');
    return redirect()->to('/carrito');
}}