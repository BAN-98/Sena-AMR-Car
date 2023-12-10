<?php
/* Uso de namespaces para los nombres de las clases  */

namespace ADSO\Models;

/* Llamado a la clase Usermodel (namespace)*/
use ADSO\Models\UserModel;

/* inicializacion de La clase */
class UserController
{
    /* Variable a que hara de instancia de la clase UsuarioModel */
    private $userModel;

    /* Constructor que recibe como parametro un Objeto UserModel y que asignamos el valor a la instancia del contructor*/
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    /* Funcion para la creacion de un Usuario(Tregistro) */
    public function createUser($data)
    {
        /* Uso de la funcion a partir de la instancia creada */
        $data = $this->userModel->create($data);

        /* validacion de datos de retorno y mensaje de confirmacion/error al  usuario */
        if ($data == true) {
            echo json_encode(['success' => 'User created successfully', 'redirection' => '../Views/login.php']);
        } else {
            echo json_encode(['error' => 'User creation failed']);
        }
    }
}
