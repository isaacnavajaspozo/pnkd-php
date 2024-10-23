<?php

require_once('./etc/ORM/helpers/tokenEncryption.php');
require_once('./etc/kernel.php');

class db extends kernel {
    private $conn;

    public function __construct() {
        $this->env();

        $host = getenv('DB_HOST');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASS');
        $database = getenv('DB_NAME');
        $key = getenv('KEY');
        $iv = getenv('IV');

        // Desencripta la contraseña que has tenido que encriptar anteriormente
        $encryptionHelper = new tokenEncryption($key, $iv);
        $decryptPassword = $encryptionHelper->decrypt($password);
        //$encryptedPassword = $encryptionHelper->encrypt($password);

        $this->conn = new mysqli($host, $username, $decryptPassword, $database);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    private function executeQuery($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Error al ejecutar la consulta: " . $this->conn->error . " en la consulta: " . $query);
        }

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    private function executeNoQuery($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Error al ejecutar la consulta: " . $this->conn->error . " en la consulta: " . $query);
        }

        return $this->conn->affected_rows > 0 ? $this->conn->affected_rows : $this->conn->insert_id;
    }

    public function select($columns, $table, $options = NULL) {
        // Preparar la consulta
        $query = "SELECT $columns FROM $table";
        if ($options !== NULL) {
            $query .= " $options";
        }
        return $this->executeQuery($query);
    }
    //Uso: $rows = $db->select("columna1, columna2", "tabla");

    public function insert($table, $columns, $values) {
        // Preparar la consulta
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->executeNoQuery($query);
    }
    //Uso: $id = $db->insert("tabla", "columna1, columna2", "'valor1', 'valor2'");

    public function update($table, $column, $options = NULL) {
        // Preparar la consulta
        $query = "UPDATE $table SET $column";
        if ($options !== NULL) {
            $query .= " WHERE $options";
        }
        return $this->executeNoQuery($query);
    }
    //Uso: $rows_affected = $db->update("tabla", "columna = 'nuevo_valor'");
    //Uso: $rows_affected = $db->update("tabla", "columna = 'nuevo_valor'", "condicion = 'valor'");

    public function delete($table, $options = NULL) {
        // Preparar la consulta
        $query = "DELETE FROM $table";
        if ($options !== NULL) {
            $query .= " WHERE $options";
        }
        return $this->executeNoQuery($query);
    }
    //Uso: $rows_affected = $db->delete("tabla", "WHERE columna = 'valor'");
    
    ###############################################################################
    public function view($viewRoute, $data = NULL) {
        require_once('./srv/public/views/' . $viewRoute);

        if ($data) {
            $data = array();
            extract($data);
        }
    }
    //Uso: $view = $db->view('index.php', $user);
    
    public function model($modelRoute) {
        require_once('./srv/models/' . $modelRoute);
        
    }
    //Uso: $view = $db->controller('index.php', $user);

}




###############################################################################
//Ejemplo:
//$rows = $db->select("columna1, columna2", "tabla");
//foreach ($rows as $row) {
//    echo $row['columna'] . "<br>";
//}

