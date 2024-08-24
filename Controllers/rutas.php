<?php

class Rutas
{
    public function showLinks($nivel)
    {
        ?>
        <link rel="stylesheet" href="<?php echo $nivel ?>Views/src/css/style.css">
        <?php
    }

    public function showScrips($nivel)
    {
        ?>
        <script src="<?php echo $nivel ?>Views/src/js/date.js"></script>
        <?php
    }
}