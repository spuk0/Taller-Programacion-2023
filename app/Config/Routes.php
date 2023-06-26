<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//Front-end routes
$routes->get('/', 'Home::index');
$routes->get('/quienes-somos', 'Home::quienes_somos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/terminos-y-usos', 'Home::terminosYUsos');

//Formulario de mensajes en contacto.
$routes->get('/contacto', 'Contacto_controller::index');
$routes->match(['get', 'post'], 'Contacto_controller/sendMessage', 'Contacto_controller::sendMessage');

//Mis productos, habitaciones de hotel.
$routes->get('/reservacion', 'Home::reservacion');


//Lista de usuarios, borrar y editar.
$routes->get('users-list', 'Usuario_controller::index');
$routes->get('delete/(:num)', 'Usuario_controller::delete/$1');
$routes->get('edit-view/(:num)', 'Usuario_controller::singleUser/$1');
$routes->post('update', 'Usuario_controller::update');


//Registro
$routes->get('/registro', 'RegistrarUsuario_controller::index');
$routes->match(['get', 'post'], 'RegistrarUsuario_controller/formValidation', 'RegistrarUsuario_controller::formValidation');
//Login
$routes->match(['get', 'post'], 'Login_controller/auth', 'Login_controller::auth');
$routes->get('/login', 'Login_controller::index');
$routes->get('/panel', 'Panel_controller::index',['filter' => 'auth']);
$routes->get('/logout', 'Login_controller::logout');

//Reservas
$routes->get('reservas-list', 'Reservas_controller::index');
$routes->get('crearReserva', 'Reservas_controller::crearReservas');
$routes->match(['get', 'post'], 'Reservas_controller/store', 'Reservas_controller::store');
$routes->get('editReserva/(:num)', 'Reservas_controller::unaReserva/$1');
$routes->post('modificar/(:num)', 'Reservas_controller::modificar/$1');
$routes->get('borrarReserva/(:num)', 'Reservas_controller::borrarReserva/$1');

//Lista de reservas eliminadas o deshabilitadas.
$routes->get('reservasEliminadas', 'Reservas_controller::listaReservasEliminadas');
$routes->get('activarReserva/(:num)', 'Reservas_controller::activarReserva/$1');

//Catalogo
$routes->get('reservaCatalogo', 'ReservaCatalogo_controller::index');

//Ventas
$routes->get('/ventas_view','Ventas_controller::ventas');

//Carrito
$routes->get('/carrito','Carrito_controller::muestra',['filter'=>'auth']);
$routes->get('/carrito-actualiza','Carrito_controller::actualiza_carrito',['filter'=>'auth']);
$routes->post('/carrito-agrega','Carrito_controller::add',['filter'=>'auth']);
$routes->get('/carrito-elimina/(:any)','Carrito_controller::remove/$1',['filter'=>'auth']);
$routes->get('/borrar','Carrito_controller::borrar_carrito',['filter'=>'auth']);
$routes->get('/carrito-comprar','Ventas_controller::comprar_carrito',['filter'=>'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
