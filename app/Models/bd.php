<?php

namespace App\Models;

use PDO;
use PDOException;
use Throwable;

class BD {
    const SERVIDOR = "localhost:3306";
    const USUARIO = "root";
    const CLAVE = "";
    const BD = "productos";

    public static function Conectar() {
        try {
            $conexion = new PDO("mysql:host=" . self::SERVIDOR . ";dbname=" . self::BD . ";charset=utf8", self::USUARIO, self::CLAVE);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("PDO Connection Error: " . $e->getMessage());
        } catch (Throwable $e) {
            die("General Error: " . $e->getMessage());
        }
    }
}
