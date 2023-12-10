<?php
/* Uso de un nombre de espacion para clases y funciones de clases */

namespace ADSO\Models;

/* llamado al namespace de la conexion */

use Model\Conection\DB;
use PDO;

class UserModel
{

    /* Funcion Publica para la validacion del login del usuario */
    public function AuthUser($username, $password)
    {
        /* Bloque try catch para el manejo de errores  */
        try {

            /* Peticion y preparacion de la consulta  */
            $stmt = DB::connect()->prepare('SELECT id_user, username, password FROM amr_clients WHERE username = :username AND password = :password');

            /* Marcado de parametros y reemplazo con el valor */
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            /* Ejecucion de la consulta */
            $stmt->execute();

            /* Recuperacion de la informacion en un array asociativo de la informacion del usuario */
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            /* Validacion del usuario y su retorno */
            if ($user) {
                return $user;
            }
            return null;
        } catch (\PDOException $th) {
            die("Error al obtener el usuario");
        }
    }

    /* Funcion para la creacion de nuevos Usuarios */
    public function create($data): bool
    {
        /* Bloque try cath para el manejo de errores */
        try {

            /* preparacion de la peticion */
            $stmt = DB::connect()->prepare('INSERT INTO amr_clients (username, phone, adress, email, password) VALUES(:username, :phone, :adress, :email, :password)');

            /* Reemplazo de parametros de posicion con el valor de entrada de un array por parametro */
            $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
            $stmt->bindParam(':phone', $data['phone'], PDO::PARAM_STR);
            $stmt->bindParam(':adress', $data['adress'], PDO::PARAM_STR);
            $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $stmt->bindParam(':password', $data['password'], PDO::PARAM_INT);
            $stmt->execute();

            /* Validacion de si la insersion fue exitosa o no  y retorno del resultado*/
            if ($stmt->rowCount() > 0) {
                return true;
            }
            return false;
        } catch (\PDOException $th) {
            die("Error al crear el usuario");
        }
    }
}
