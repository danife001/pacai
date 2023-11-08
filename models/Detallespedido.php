<?php

namespace Model;

class Detallespedido extends ActiveRecord {
    protected static $tabla = 'detallespedido';
    protected static $columnasDB = ['id', 'pedidoId', 'productoId', 'cantidad', 'precio', 'total','nombre'];

    public $id;
    public $pedidoId;
    public $productoId;
    public $cantidad;
    public $precio;
    public $total;
    public $nombre;
    
   
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->pedidoId = $args['pedidoId'] ?? null;
        $this->productoId = $args['productoId'] ?? null;
        $this->cantidad = $args['cantidad'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->total = $args['total'] ?? null;        
        $this->nombre = $args['nombre'] ?? '';        
    }


}
