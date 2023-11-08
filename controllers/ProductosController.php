<?php

namespace Controllers;

use Classes\Paginacion;
use MVC\Router;
use Model\Producto;
use Intervention\Image\ImageManagerStatic as Image;

class ProductosController{

    public static function index(Router $router){

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual,FILTER_VALIDATE_INT);    
        if(!$pagina_actual||$pagina_actual<1){
            header('Location: /admin/productos?page=1');
        }
        
        
        $registro_por_pagina= 10;

        $total = Producto::total();
        
        

        $paginacion = new Paginacion($pagina_actual,$registro_por_pagina,$total);

        if($paginacion->total_paginas()< $pagina_actual){
            header('Location: /admin/productos?page=1');
        }

        $producto = Producto::paginar($registro_por_pagina,$paginacion->offset());

        if(!is_admin()){
            header('Location: /login');
        }

        $router->render('admin/productos/index',[
            'titulo' => 'Panel de Productos',
            'productos' =>$producto,
            'paginacion' =>$paginacion->paginacion()
        ]);
    }



    public static function crear(Router $router){
        
        if(!is_admin()){
            header('Location: /login');
        }


        $alertas = [];
        $producto = new Producto;

     
        if($_SERVER['REQUEST_METHOD']==='POST'){
              
            
            
            if(!empty($_FILES['imagen_url']['tmp_name'])){
               $carpeta_imagenes = '../public/img/productos';

               if(!is_dir($carpeta_imagenes)){
                mkdir($carpeta_imagenes,0755,true);
               }
               
               $imagen_png = Image::make($_FILES['imagen_url']['tmp_name'])->fit(800,800)->encode('png',80);
               $imagen_webp = Image::make($_FILES['imagen_url']['tmp_name'])->fit(800,800)->encode('webp',80);

               $nombre_imagen = md5(uniqid(rand(),true));

               $_POST['imagen_url']=$nombre_imagen;
            }
            $producto->sincronizar($_POST);
            
            $alertas = $producto->validar();
            if(empty($alertas)){
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                
                
                $resultado = $producto->guardar();

                if($resultado){
                    header('Location: /admin/productos');
                }
            }

            
        }


        $router->render('admin/productos/crear',[
            'titulo' => 'Registrar Producto',
            'producto'=> $producto,
            'alertas' => $alertas
        ]);
    }

    public static function editar(Router $router){

        if(!is_admin()){
            header('Location: /login');
        }


        $alertas =[];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/productos');
        }

        $producto= Producto::find($id);

        if(!$producto){
            header('Location: /admin/productos');
        }
       
        $producto->imagen_actual = $producto->imagen_url;
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!is_admin()){
                header('Location: /login');
            }
    

            if(!empty($_FILES['imagen_url']['tmp_name'])){
                $carpeta_imagenes = '../public/img/productos';
 
                if(!is_dir($carpeta_imagenes)){
                 mkdir($carpeta_imagenes,0755,true);
                }
                
                $imagen_png = Image::make($_FILES['imagen_url']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen_url']['tmp_name'])->fit(800,800)->encode('webp',80);
 
                $nombre_imagen = md5(uniqid(rand(),true));
 
                $_POST['imagen_url']=$nombre_imagen;
             }else{
                $_POST['imagen_url'] = $producto->imagen_actual;
             }
             $producto->sincronizar($_POST);

             $alertas = $producto->validar();

             if(empty($alertas)){
                if(isset($nombre_imagen)){
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                    
                }
                $resultado = $producto->guardar();

                if($resultado){
                    header('Location: /admin/productos');
                }
             }
        }
        
        $router->render('admin/productos/editar',[
            'titulo' => 'Actualizar Producto',
            'producto'=> $producto ,
            'alertas' => $alertas
        ]);


    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!is_admin()){
                header('Location: /login');
            }
    

            $id = $_POST['id'];
            $producto = Producto::find($id);

            if(!isset($producto)){
                header('Location: /admin/productos');
            }
            
            $resultado = $producto->eliminar();

            if($resultado){
                header('Location: /admin/productos');
            }

        }

    }
}