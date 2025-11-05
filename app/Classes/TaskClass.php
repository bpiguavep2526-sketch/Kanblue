<?php

namespace App\Classes;

class Task {
    private $titulo;
    private $fecha;
    private $descripcion;
    private $estado;
    private $tipo;
    private $userAsig;

    private static $numTareas = 0;

    public function __construct($titulo, $descripcion, $estado, $tipo, $userAsig) {
        self::$numTareas++;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->tipo = $tipo;
        $this->userAsig = $userAsig;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    
    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }


    
    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

        /**
     * Get the value of tipo
     */
    public function getUserAsig()
    {
        return $this->userAsig;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setUserAsig($tipo)
    {
        $this->userAsig = $userAsig;

        return $this;
    }
}

?>