<?php

namespace Controllers;

use Model\Carrito;
use Model\Detallespedido;
use Model\Producto;
use Model\Resumen;

class ApiController{

    public static function index(){
        $productos = Producto::all();
        echo json_encode($productos);


    }




    public static function guardar(){
        
        // $carrito = new Carrito($_POST);

        $idUsuario = $_POST['usuario_id'];
        $idProducto = explode(",",$_POST['producto_id']);
        $cantidad = explode(",",$_POST['cantidad']);

        $combinedArray = array_combine( $idProducto , $cantidad );

        foreach ($combinedArray as $idProducto => $cantidad) {
                $argc=[
                    'usuario_id'=>$idUsuario,
                    'producto_id'=>$idProducto,
                    'cantidad'=>$cantidad
                ];
                $carrito = new Carrito($argc);
                $carrito->guardar();
        }

        $respuesta =[
            'resultado'=>  $idUsuario
        ];

        echo json_encode($respuesta);
    }



}