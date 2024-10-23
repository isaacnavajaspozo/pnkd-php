<?php

class Login {
    private $db;
    private $sessionKey = 'user_id';

    public function __construct($db) {
        $this->db = $db;
        session_start();
    }

    // Método para iniciar sesión
    public function login($username, $password) {
        // Validar el usuario
        $stmt = $this->db->prepare('SELECT id, password FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION[$this->sessionKey] = $user['id'];
            return true;
        } else {
            return false;
        }
    }

    // Método para cerrar sesión
    public function logout() {
        unset($_SESSION[$this->sessionKey]);
        session_destroy();
    }

    // Método para verificar si el usuario está conectado
    public function isLoggedIn() {
        return isset($_SESSION[$this->sessionKey]);
    }

    // Método para obtener el ID del usuario conectado
    public function getUserId() {
        return $_SESSION[$this->sessionKey] ?? null;
    }
}
