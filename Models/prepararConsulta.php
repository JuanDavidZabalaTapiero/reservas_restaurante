<?php

require_once(__DIR__ . '/conexionDB.php');

class PrepararConsulta
{
    public $objConexionDB;

    public $conexion;

    public function __construct()
    {
        $this->objConexionDB = new ConexionDB();

        $this->conexion = $this->objConexionDB->getConexion();
    }

    public function prepararConsulta($consulta, $bindValues)
    {
        $consultaPreparada = $this->conexion->prepare($consulta);

        if ($bindValues !== 0) {
            foreach ($bindValues as $key => $value) {
                $consultaPreparada->bindValue($key, $value);
            }
        }

        $consultaPreparada->execute();

        return $consultaPreparada;
    }
}