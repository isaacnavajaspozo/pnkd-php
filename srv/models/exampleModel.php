<?php

require_once './etc/ORM/db.php';

class ExampleModel extends db{
    
    public function __construct() {
        parent::__construct();
        
    }
    
    public function index() {
        echo "hola mundo";
    }
    
    public function getUserById($id) {
        // Utilizar el método select para obtener el usuario por ID
        $user = $this->select("*", "usuarios", "WHERE id = '$id'");
        return $user;
    }
    
    public function postUser() {
        // Insertar un nuevo usuario
        $id = $this->insert("usuarios", "id, titulo", "'7', '44'");
        return $id;
    }
}

