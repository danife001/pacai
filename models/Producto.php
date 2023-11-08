<?php

namespace Model;

class Producto extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'descripcion', 'precio', 'stock', 'imagen_url'];

    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $imagen_url;
    public $imagen_actual;
    public $cantidad=1;
   
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? null;
        $this->stock = $args['stock'] ?? null;
        $this->imagen_url = $args['imagen_url'] ?? '';
        
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->descripcion) {
            self::$alertas['error'][] = 'La Descripción es Obligatorio';
        }
        if(!$this->precio) {
            self::$alertas['error'][] = 'El Precio es Obligatorio';
        }
        if(!$this->stock) {
            self::$alertas['error'][] = 'La Cantidad es obligatoria';
        }
        if(!$this->imagen_url) {
            self::$alertas['error'][] = 'La Imagen es obligatorio';
        }
    
        return self::$alertas;
    }
}