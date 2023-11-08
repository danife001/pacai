<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\ApiController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\ClientController;
use Controllers\DashboardController;
use Controllers\PaginasController;
use Controllers\PedidosController;
use Controllers\ProductosController;
use Controllers\UsuariosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);


$router->get('/admin/dashboard', [DashboardController::class, 'index']);


$router->get('/admin/productos', [ProductosController::class, 'index']);
$router->get('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->post('/admin/productos/crear', [ProductosController::class, 'crear']);
$router->get('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/eliminar', [ProductosController::class, 'eliminar']);




$router->get('/client/dashboard',[ClientController::class,'index']);
$router->get('/client/pedidos',[ClientController::class,'pedido']);
$router->get('/client/perfil',[ClientController::class,'perfil']);
$router->post('/client/perfil',[ClientController::class,'perfil']);
$router->get('/client/pedidos/detalles', [ClientController::class, 'detalles']);


$router->get('/paginas/blog', [PaginasController::class, 'blog']);
$router->get('/',[PaginasController::class,'index']);
$router->get('/paginas/pedido',[PaginasController::class,'pedido']);
$router->post('/paginas/pedido',[PaginasController::class,'pedido']);
$router->get('/paginas/detalles',[PaginasController::class,'detalles']);



$router->get('/api/productos',[ApiController::class,'index']);
$router->post('/api/carrito',[ApiController::class,'guardar']);
$router->get('/api/resumen',[ApiController::class,'resumen']);
$router->post('/api/save',[ApiController::class,'save']);




$router->get('/admin/pedidos', [PedidosController::class, 'index']);
$router->get('/admin/pedidos/detalles', [PedidosController::class, 'detalles']);
$router->get('/admin/pedidos/editar', [PedidosController::class, 'editar']);
$router->post('/admin/pedidos/editar', [PedidosController::class, 'editar']);
$router->post('/admin/pedidos/eliminar', [PedidosController::class, 'eliminar']);

$router->get('/admin/usuarios', [UsuariosController::class, 'index']);
$router->get('/admin/usuarios/editar', [UsuariosController::class, 'editar']);
$router->post('/admin/usuarios/editar', [UsuariosController::class, 'editar']);
$router->post('/admin/usuarios/eliminar', [UsuariosController::class, 'eliminar']);




$router->comprobarRutas();