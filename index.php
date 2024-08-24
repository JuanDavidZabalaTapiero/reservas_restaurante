<?php

require_once(__DIR__ . '/Controllers/rutas.php');
$objRutas = new Rutas();

require_once(__DIR__ . '/Controllers/contenido.php');
$objContenido = new Contenido();

require_once(__DIR__ . '/Controllers/mesas/mesasController.php');
$mesasController = new MesasController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form = $_POST["form"];

    if ($form == "reserva") {
        $personas = $_POST["numPersonas"];
        $fechaHora = $_POST["datetime"];
        $nombre = $_POST["nombreUser"];
        $telefono = $_POST["telUser"];

        $mesasController->makeReserva($personas, $fechaHora, $nombre, $telefono);
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <?php
    $objRutas->showLinks("");
    ?>
</head>

<body>
    <?php
    $objContenido->showFormReserva();
    ?>

    <script>
        $(document).ready(function () {
            $('#formReserva').on('submit', function (event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        console.log("Reserva hecha con éxito!");
                    },
                    error: function (xhr, status, error) {
                        console.error('Error AJAX:', xhr.responseText);
                    }
                });
            });
        });
    </script>

    <?php
    $objRutas->showScrips("");
    ?>
</body>

</html>