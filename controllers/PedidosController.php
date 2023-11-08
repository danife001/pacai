<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Detallespedido;
use Model\Pedidos;
use MVC\Router;

class PedidosController{

 

    public static function index(Router $router){

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual,FILTER_VALIDATE_INT);    
        if(!$pagina_actual||$pagina_actual<1){
            header('Location: /admin/pedidos?page=1');
        }
        
        
        $registro_por_pagina= 10;
    
        $total = Pedidos::total();
        
        
    
        $paginacion = new Paginacion($pagina_actual,$registro_por_pagina,$total);
    
        if($paginacion->total_paginas()< $pagina_actual){
            header('Location: /admin/productos?page=1');
        }
    
        $pedidos = Pedidos::paginar($registro_por_pagina,$paginacion->offset());

        $sql = 'SELECT pedidos.*,usuarios.nombre FROM pedidos LEFT OUTER JOIN usuarios ON pedidos.usuario_id = usuarios.id';

        $pedidos = Pedidos::SQL($sql);
    
        if(!is_admin()){
            header('Location: /login');
        }

        $router->render('admin/pedidos/index',[
            'titulo' => 'Panel de Pedidos',
            'pedidos'=>$pedidos,
            'paginacion' =>$paginacion->paginacion()
        ]);
    }
    public static function editar(Router $router){

        $id=$_GET['id'];

        $pedido=Pedidos::find($id);
        $alertas= [];


        if($_SERVER['REQUEST_METHOD']==='POST'){
        
            $pedido->sincronizar($_POST);
            
            $resultado = $pedido->guardar();
            
            if($resultado){
                header('Location: /admin/pedidos');
            }
        
        }

        $router->render('admin/pedidos/editar',[
            'titulo' => 'Detalles del pedido',
            'pedido'=>$pedido,
            'alertas'=>$alertas
        ]);

    }



    
    public static function detalles(Router $router){


        $id = $_GET['id'];
        $sql='SELECT detallespedido.*,productos.nombre FROM detallespedido LEFT OUTER JOIN productos ON detallespedido.productoId = productos.id WHERE detallespedido.pedidoId='.$id;

        $detalles = Detallespedido::SQL($sql);
        
        $router->render('admin/pedidos/detalles',[
            'titulo' => 'Detalles del pedido',
            'detalles'=>$detalles
        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!is_admin()){
                header('Location: /login');
            }
    

            $id = $_POST['id'];
            $pedido = Pedidos::find($id);

            if(!isset($pedido)){
                header('Location: /admin/pedidos');
            }
            
            $resultado = $pedido->eliminar();

            if($resultado){
                header('Location: /admin/pedidos');
            }

        }

    }


}