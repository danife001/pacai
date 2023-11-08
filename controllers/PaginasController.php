<?php

namespace Controllers;

use Model\Carrito;
use Model\Consulta;
use Model\Detallespedido;
use Model\Pedidos;
use MVC\Router;

class PaginasController{

    public static function index(Router $router){
        
        
        $router->render('/paginas/index',[
            'titulo' =>'Bienvenido  a A.C.A.I'
        ]);

    }




    public static function blog(Router $router){
        $router->render('paginas/blog',[
            'titulo' => 'Sobre A.C.A.I'
        ]);
    }


    public static function pedido(Router $router){
       session_start();
        $id = $_SESSION['id'];
        $alertas=[];
         
        $pedido = new Pedidos;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $pedido->sincronizar($_POST);

            $alertas = $pedido->validar();

            if(empty($alertas)){
                $pedido->guardar();
            }
            
        }


        $router->render('paginas/pedido',[
            'titulo' => 'Datos de envio',
            'id'=>$id,
            'alertas'=>$alertas
        ]);
    }


    public static function detalles(Router $router){

        session_start();
        $id = $_SESSION['id'];

        $sql='SELECT  pedidos.id,pedidos.id as pedidoId,productos.nombre , carrito_compras.producto_id, carrito_compras.cantidad, productos.precio FROM carrito_compras 
        LEFT OUTER JOIN usuarios 
        ON carrito_compras.usuario_id = usuarios.id
        LEFT OUTER JOIN pedidos
        ON pedidos.usuario_id=carrito_compras.usuario_id
        LEFT OUTER JOIN productos
        ON productos.id = carrito_compras.producto_id WHERE carrito_compras.usuario_id ='. $id ;

        $detalles = Consulta::SQL($sql);

        // debuguear($detalles);



        $router->render('paginas/detalles',[
            'titulo' => 'Destalles del pedido',
            'detalles'=>$detalles
        ]);
    }

}