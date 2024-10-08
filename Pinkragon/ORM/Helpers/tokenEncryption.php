<?php

class tokenEncryption extends stdClass  {
    private $key;
    private $iv;

    public function __construct($key, $iv) {
        $this->key = $key;
        $this->iv = $iv;
    }
    
    public function randomPseudoIV(){
        $allowed_characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#!()&%';
        $allowed_length = strlen($allowed_characters);
    
        $random_bytes = openssl_random_pseudo_bytes(16);
        $generated_iv = '';
    
        for ($i = 0; $i < strlen($random_bytes); $i++) {
            $char = $random_bytes[$i];
            $index = ord($char) % $allowed_length;
            $generated_iv .= $allowed_characters[$index];
        }
    
        return $generated_iv;
    }
    
    public function randomPseudoKEY(){
        $allowed_characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#!()&%';
        $allowed_length = strlen($allowed_characters);
    
        $random_bytes = openssl_random_pseudo_bytes(32);
        $generated_key = '';
    
        for ($i = 0; $i < strlen($random_bytes); $i++) {
            $char = $random_bytes[$i];
            $index = ord($char) % $allowed_length;
            $generated_key .= $allowed_characters[$index];
        }
    
        return $generated_key;
    }

    public function encrypt($data) {
        return openssl_encrypt($data, 'aes-256-cbc', $this->key, 0, $this->iv);
    }

    public function decrypt($data) {
        return openssl_decrypt($data, 'aes-256-cbc', $this->key, 0, $this->iv);
    }
}

/*
* Ejemplo:
* $key = 'tu_clave_secreta';
* $iv = 'tu_vector_de_inicializacion';
*
* Crear una instancia de tokenHelper
* $encryptionHelper = new tokenHelper($key, $iv);
*
* Encriptar una contraseña
* $password = 'tu_contraseña';
* $encryptedPassword = $encryptionHelper->encrypt($password);
* echo "Contraseña encriptada: $encryptedPassword\n";
*
* Desencriptar la contraseña
* $decryptedPassword = $encryptionHelper->decrypt($encryptedPassword);
* echo "Contraseña desencriptada: $decryptedPassword\n";
*/
