<?php

require_once(__DIR__ . '/prepararConsulta.php');

class ConsultasMesas extends PrepararConsulta
{
    // CREATE

    // READ
    public function selectMaxMesaDesocupada()
    {
        $selectMaxMesaDesocupada = "SELECT * 
        FROM mesas m 
        WHERE m.ocupada = 'No' 
        ORDER BY m.asientos DESC LIMIT 1;";

        $result = $this->prepararConsulta($selectMaxMesaDesocupada, 0);

        return $result->fetch();
    }

    public function selectMinMesaDesocupada($personas)
    {
        $selectMinMesaDesocupada = "SELECT * 
        FROM mesas m 
        WHERE (m.asientos - :personas) >= 0 AND m.ocupada = 'No' 
        ORDER BY m.asientos ASC";

        $bindValues = [
            ':personas' => $personas
        ];

        $result = $this->prepararConsulta($selectMinMesaDesocupada, $bindValues);

        return $result->fetch();
    }

    // UPDATE
    public function updateOcupadaMesa($id_mesa)
    {
        $updateOcupadaMesa = "UPDATE mesas 
        SET ocupada = 'Si' 
        WHERE id_mesa = :id_mesa";

        $bindValues = [
            ':id_mesa' => $id_mesa
        ];

        $this->prepararConsulta($updateOcupadaMesa, $bindValues);
    }

    // DELETE
}