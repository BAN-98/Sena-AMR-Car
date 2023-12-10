<?php
/* Creacion de nombre de estacio para el controlador */
namespace ADSO\Controllers;
/* Uso de el modelo del usuario  */
use ADSO\Models\UserModel;
use PDO;

/* Inicializacion de la clase */
class AuthController
{
    /* Propiedad de la clase AuthController */
    private $userModel;

    /* Constructor de la Clase que me permite instanciar metodos del Modelo del usuario */
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /* Funcion de Atenticacion para el login del usuario params(nombreUsuario, contraseña)*/
    public function AuthUser($username, $password)
    {
        /* Uso de la function AuthUser del modelo del usuario  para authenticar el usuario*/
        $userauth = $this->userModel->AuthUser($username, $password);

        /* Validacion para retornanr una respuesta en la vista */
        if($userauth){
            echo json_encode(['success' => 'Authent successfully', 'redirection' => '../Views/cars.php']);
        }else{
            echo json_encode(['err' => 'AuthUser not found']);
        }
    }
}
