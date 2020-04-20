<?php

class InicioController extends ControladorBase
{
    public $conectar;
    public $adapter;

    public function __construct()
    {
        parent::__construct();

        $this->conectar = new Conectar();
        $this->adapter = $this->conectar->conexion();
    }

    public function index()
    {
        $cabanias = new Cabania($this->adapter);
        $cabanias = $cabanias->getAll();

        $lista = array();

        foreach ($cabanias as $c) {
            $coleccion = new Imagen($this->adapter);
            $imagenes = array();
            $imagenes = $coleccion->buscaImagenes($c->id);
            $c->imagenes = $imagenes;
            $lista[] = $c;
        }

        $this->view("Inicio/index", array(
            "lista" => $lista,
 
        ));


    }

    
}
