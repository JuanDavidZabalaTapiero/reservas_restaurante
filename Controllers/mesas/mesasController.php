<?php

require_once(__DIR__ . '/../../Models/consultasMesas.php');

class MesasController
{
    public $objConsultasMesas;

    public function __construct()
    {
        $this->objConsultasMesas = new ConsultasMesas();
    }

    public function makeReserva($personas)
    {
        // Consulto la mesa segun la cantidad de personas
        $fMesa = $this->objConsultasMesas->selectMinMesaDesocupada($personas);

        $idMesa = $fMesa["id_mesa"];

        $this->objConsultasMesas->updateOcupadaMesa($idMesa);

        return ['success' => true, 'message' => 'Reserva realizada con éxito'];
    }
}