<?php
namespace Model;

class Resumen extends ActiveRecord {
    protected static $tabla = 'carrito_compras';
    protected static $columnasDB = ['pedidoId' ,'producto_id', 'cantidad', 'precio'];


    public $pedidoId;
    public $producto_id;
    public $cantidad;
    public $precio;
   
    
    public function __construct($args = [])
    {
        $this->pedidoId = $args['pedidoId'] ?? null;
        $this->producto_id = $args['producto_id'] ?? null;
        $this->cantidad = $args['cantidad'] ?? null;
        $this->precio = $args['precio'] ?? null;
       
        
    }

}