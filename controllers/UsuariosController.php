<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class UsuariosController{

    public static function index(Router $router){

        $usuarios=Usuario::all();


        $router->render('admin/usuarios/index',[
            'titulo' => 'Panel de Usuarios',
            'usuarios'=>$usuarios
        ]);
    }


    public static function editar(Router $router){

        $id=$_GET['id'];

        $usuario=Usuario::find($id);
        $alertas= [];


        if($_SERVER['REQUEST_METHOD']==='POST'){
        
            $usuario->sincronizar($_POST);
            
            $resultado = $usuario->guardar();
            
            if($resultado){
                header('Location: /admin/usuarios');
            }
        
        }

        $router->render('admin/usuarios/editar',[
            'titulo' => 'Detalles del pedido',
            'usuario'=>$usuario,
            'alertas'=>$alertas
        ]);

    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!is_admin()){
                header('Location: /login');
            }
    

            $id = $_POST['id'];
            $usuario = Usuario::find($id);

            if(!isset($usuario)){
                header('Location: /admin/usuarios');
            }
            
            $resultado = $usuario->eliminar();

            if($resultado){
                header('Location: /admin/usuarios');
            }

        }

    }
}