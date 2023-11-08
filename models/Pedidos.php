<?php

namespace Model;

class Pedidos extends ActiveRecord {
    protected static $tabla = 'pedidos';
    protected static $columnasDB = ['id', 'usuario_id', 'fecha', 'estado', 'envio', 'direccion','pago'];

    public $id;
    public $usuario_id;
    public $fecha;
    public $estado;
    public $envio;
    public $direccion;
    public $pago;
    public $nombre;
   
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->usuario_id = $args['usuario_id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->envio = $args['envio'] ?? null;
        $this->direccion = $args['direccion'] ?? '';
        $this->pago = $args['pago'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        
    }


    public function validar() {
        if(!$this->envio) {
            self::$alertas['error'][] = 'Seleccione metodo de envio';
        }
        if(!$this->direccion) {
            self::$alertas['error'][] = 'La Direccion es Obligatoria';
        }
        if(!$this->pago) {
            self::$alertas['error'][] = 'Seleccione metodo de pago ';
        }
        
        return self::$alertas;
    }

}