<?php
/* Uso de un namespace para el nombre de las clases y funciones  */
namespace Model\Conection;

use PDO;

/* Conexion a la base de Datos */
/* Inicializacione de la clase */
class DB
{
    /* Principales variables que nos permitiran crear una conexion con la base de datos */
    private static $connect;
    protected static $host = 'localhost';
    protected static $user = 'root';
    protected static $password = '';
    protected static $DB = 'am_rent_car';

    /* Funcion estatica para la conexion a la base de datos */
    public static function connect()
    {
        /* Validacion de instancia de conexion */
        if (!self::$connect) {

            /* Manejo de errores a traves de un bloque trycath */
            try {
                /* Creacion de conexion a la base de datos y lectura de errores */
                self::$connect = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$DB, self::$user, self::$password);

                /* Devlucion de un Bool en caso de que falle o sea correcta la conexion */
                self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (\PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$connect;
    }
}
