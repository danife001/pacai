<?php
namespace Model;

class Consulta extends ActiveRecord {
    protected static $tabla = 'carrito_compras';
    protected static $columnasDB = ['id','nombre','pedidoId' ,'producto_id', 'cantidad', 'precio'];

    public $id;
    public $nombre;
    public $pedidoId;
    public $producto_id;
    public $cantidad;
    public $precio;
   
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->pedidoId = $args['pedidoId'] ?? null;
        $this->producto_id = $args['producto_id'] ?? null;
        $this->cantidad = $args['cantidad'] ?? null;
        $this->precio = $args['precio'] ?? null;
       
        
    }

}