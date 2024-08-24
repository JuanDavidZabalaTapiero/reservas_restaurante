<?php

require_once(__DIR__ . '/../Models/consultasMesas.php');

class Contenido
{
    public $objConsultasMesas;

    public function __construct()
    {
        $this->objConsultasMesas = new ConsultasMesas();
    }

    public function showFormReserva()
    {
        $maxNumMesaDesocupada = $this->objConsultasMesas->selectMaxMesaDesocupada();

        $numeroAsientos = $maxNumMesaDesocupada["asientos"];
        ?>
        <form action="" method="post" id="formReserva">
            <input type="hidden" name="form" value="reserva">

            <div class="div_input">
                <label for="datetime">Fecha y hora</label>
                <input type="datetime-local" id="datetime" name="datetime">
            </div>

            <div class="div_input">
                <label for="numPersonas">Número de personas</label>
                <select name="numPersonas" id="numPersonas">
                    <?php
                    for ($i = 1; $i <= $numeroAsientos; $i++) {
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="div_input">
                <label for="nombreUser">Nombre</label>
                <input type="text" name="nombreUser" id="nombreUser">
            </div>

            <div class="div_input">
                <label for="telUser">Teléfono</label>
                <input type="number" name="telUser" id="telUser">
            </div>

            <div class="div_input">
                <button type="submit">Reservar</button>
            </div>
        </form>
        <?php
    }
}