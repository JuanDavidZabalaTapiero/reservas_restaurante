<?php

require_once(__DIR__ . '/consultasMesas.php');
$obj = new ConsultasMesas();
$fMesa = $obj->selectMinMesaDesocupada(4);

echo $fMesa["id_mesa"];