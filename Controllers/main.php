<?php
/* Uso de nombres de espacios para cada una de las clases incluidas en el archivo */

use ADSO\Controllers\AuthController;
use ADSO\Models\UserController;
use ADSO\Models\UserModel;

/* Bloque de manejode errores trycath */

try {

    /* inclusion de archivos necesarios (Controladores, Modelos) */
    include('AuthController.php');
    include('UserController.php');
    include('../Models/Conection.php');
    include('../Models/User.php');

    /* Validacion del valor de la peticion */
    switch ($_REQUEST['action']) {

            /* Case Login */
        case 'login':

            /* Instanciamiento y llamado a la clase AuthController */
            $authController = new AuthController($userModel = new UserModel);

            /* Uso de funcion del instanciamiento de la clase */
            $authController->AuthUser($_REQUEST['username'], $_REQUEST['password']);
            break;

            /* Case Register */
        case 'register':

            /* Instanciamiento de la clase UserController */
            $userController = new UserController($userModel = new UserModel);

            /* Uso de la funcion de la instancia de la clase */
            $userController->createUser($_REQUEST);
            break;

        case 'listaUsuarios':
            $userController = new UserController($userModel = new UserModel);
            $userController->getUsers();
            break;
    }
} catch (\Throwable $th) {
    echo $th->getMessage();
    echo $th->getLine();
}
