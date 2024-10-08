<?php
require_once './Pinkragon/ORM/db.php';

class ExampleController extends db {

    // Declarar la propiedad
    private $exampleModel;

    public function __construct() {
        parent::__construct(); // Llamada al constructor de la clase padre

    }
    
    public function index() {
        $data = array(
            'titulo' => 'Página de inicio'
        );
        
        $this->view('index.php', $data);
    }
    
    public function test() {
        $data = $this->model('exampleModel.php');
        
        // podemos utilizar el helper debug en los modelos, vistas y controladores si tenemos el error en true desde .env
        Debug::kill($data);
    }

    public function getUser($id) {
        $data = $this->model('exampleModel.php');
        
        if ($data) {
            echo "Usuario encontrado: <br>";
            $this->view('index.php', $data);
        } else {
            echo "Usuario no encontrado";
        }
        
        // podemos utilizar el helper debug en los modelos, vistas y controladores si tenemos el error en true desde .env
        // Debug::kill('hola');
    }
    
    public function store() {
        echo "Guardando id ...";
        // Guardar los datos usando el método insert
        $this->insert("usuarios", "id, titulo", "'7', '44'");
    }
     
    public function notFound() {
        echo "Página no encontrada";
    }

}
