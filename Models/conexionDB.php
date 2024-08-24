<?php

class ConexionDB
{
    public function getConexion()
    {
        try {
            $host = "";
            $dbName = "restaurante";
            $user = "root";
            $pass = "";

            $conexion = new PDO("mysql:host=$host;dbname=$dbName;", $user, $pass);

            return $conexion;
            
        } catch (PDOException $e) {
            echo 'Error al conectarse a la BD: ' . $e->getMessage();
        }
    }
}