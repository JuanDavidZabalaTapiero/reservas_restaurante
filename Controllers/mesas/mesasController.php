<?php

require_once(__DIR__ . '/../../Models/consultasMesas.php');

require_once(__DIR__ . '/../../Models/consultasReservas.php');

class MesasController
{
    public $objConsultasMesas;

    public $objConsultasReservas;

    public function __construct()
    {
        $this->objConsultasMesas = new ConsultasMesas();

        $this->objConsultasReservas = new ConsultasReservas();
    }

    public function makeReserva($personas, $fecha_hora, $nombre, $telefono)
    {
        // Consulto la mesa segun la cantidad de personas
        $fMesa = $this->objConsultasMesas->selectMinMesaDesocupada($personas);

        $idMesa = $fMesa["id_mesa"];

        // Registro la reserva
        $this->objConsultasReservas->insertReserva($idMesa, $fecha_hora, $personas, $nombre, $telefono);

        // Cambio el estado de la mesa
        $this->objConsultasMesas->updateOcupadaMesa($idMesa);

        return ['success' => true];
    }
}