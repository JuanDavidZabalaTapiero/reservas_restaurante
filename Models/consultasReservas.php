<?php

require_once(__DIR__ . '/prepararConsulta.php');

class ConsultasReservas extends PrepararConsulta
{
    // CREATE
    public function insertReserva($cod_mesa, $fecha_hora, $personas, $nombre, $telefono)
    {
        $insertReserva = "INSERT INTO reservas(cod_mesa, fecha_hora, personas, nombre, telefono) VALUES (:cod_mesa, :fecha_hora, :personas, :nombre, :telefono)";

        $bindValues = [
            ':cod_mesa' => $cod_mesa,
            ':fecha_hora' => $fecha_hora,
            ':personas' => $personas,
            ':nombre' => $nombre,
            ':telefono' => $telefono
        ];

        $this->prepararConsulta($insertReserva, $bindValues);
    }

    // READ

    // UPDATE

    // DELETE
}