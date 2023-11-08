<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Consulta;
use Model\Detallespedido;
use Model\Pedidos;
use Model\Usuario;
use MVC\Router;

class ClientController{

    public static function index(Router $router){
        if(!is_auth()){
            header('Location: /');
        }

        
        $router->render('client/dashboard/index',[
            'titulo' => 'Panel de Usuarios'
        ]);
    }


    public static function pedido(Router $router){
        if(!is_auth()){
            header('Location: /');
        }
        $id = $_SESSION['id'];
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual,FILTER_VALIDATE_INT);    
        if(!$pagina_actual||$pagina_actual<1){
            header('Location: /client/pedidos?page=1');
        }
        
        
        $registro_por_pagina= 10;
        $total = Pedidos::total();
        $paginacion = new Paginacion($pagina_actual,$registro_por_pagina,$total);

        if($paginacion->total_paginas()< $pagina_actual){
            header('Location: /admin/productos?page=1');
        }

        $producto = Pedidos::paginar($registro_por_pagina,$paginacion->offset());

        
        $sql='SELECT * FROM pedidos WHERE pedidos.usuario_id = '.$id;
        
        
        $pedidos = Pedidos::SQL($sql );
        
        $router->render('client/pedidos/index',[
            'titulo'=> 'Panel de los pedidos',
            'pedidos'=>$pedidos,
            'paginacion' =>$paginacion->paginacion()
        ]);
    }




    public static function detalles(Router $router){
        if(!is_auth()){
            header('Location: /');
        }

        $id = $_GET['id'];
        $sql='SELECT detallespedido.*,productos.nombre FROM detallespedido LEFT OUTER JOIN productos ON detallespedido.productoId = productos.id WHERE detallespedido.pedidoId='.$id;

        $detalles = Detallespedido::SQL($sql);
        
        $router->render('client/pedidos/detalles',[
            'titulo' => 'Detalles del pedido',
            'detalles'=>$detalles
        ]);
    }



    public static function perfil(Router $router){

        if(!is_auth()){
            header('Location: /');
        }


        $id = $_SESSION['id'];

        $alertas =[];
        $usuario=Usuario::find($id);

        if($_SERVER['REQUEST_METHOD']==='POST'){
        
            $usuario->sincronizar($_POST);

            $resultado = $usuario->guardar();
            
            if($resultado){
                header('Location: /client/dashboard');
            }
        
        }
        $router->render('client/perfil/index',[
            'titulo'=> 'Panel de los perfil',
            'alertas'=>$alertas,
            'usuario'=>$usuario
        ]);
    }
}



// $sql='SELECT  pedidos.id,pedidos.id as pedidoId,productos.nombre , carrito_compras.producto_id, carrito_compras.cantidad, productos.precio FROM carrito_compras 
        // LEFT OUTER JOIN usuarios 
        // ON carrito_compras.usuario_id = usuarios.id
        // LEFT OUTER JOIN pedidos
        // ON pedidos.usuario_id=carrito_compras.usuario_id
        // LEFT OUTER JOIN productos
        // ON productos.id = carrito_compras.producto_id WHERE carrito_compras.usuario_id ='. $id;