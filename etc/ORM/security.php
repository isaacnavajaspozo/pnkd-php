<?php
require_once('./srv/kernel.php');

session_start();

class Security extends kernel {
    // Genera un token CSRF y lo guarda en la sesión
    public static function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    // Verifica el token CSRF
    public static function verifyCsrfToken($token) {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }

    // Sanitiza una cadena para evitar XSS
    public static function sanitizeString($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    // Verifica si un valor es un email válido
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Protege contra SQL Injection usando consultas preparadas (mysqli)
    public static function prepareQuery($mysqli, $sql, $params) {
        if ($stmt = $mysqli->prepare($sql)) {
            // Construye el tipo de datos para cada parámetro
            $types = str_repeat('s', count($params)); // Asume que todos los parámetros son cadenas (puedes ajustar esto según sea necesario)
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            return $stmt;
        } else {
            throw new Exception("Error en la preparación de la consulta: " . $mysqli->error);
        }
    }

    // Genera un hash seguro para contraseñas
    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    // Verifica si una contraseña coincide con su hash
    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
}

$this->security = new Security();









// Ejemplo de uso en un formulario

// Generar un token CSRF
$csrfToken = Security::generateCsrfToken();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar token CSRF
    if (!Security::verifyCsrfToken($_POST['csrf_token'])) {
        die('Token CSRF inválido.');
    }

    // Procesar datos del formulario
    $mysqli = new mysqli('localhost', 'user', 'password', 'testdb');
    if ($mysqli->connect_error) {
        die('Error en la conexión: ' . $mysqli->connect_error);
    }
    
    // Sanitizar entrada
    $username = Security::sanitizeString($_POST['username']);
    $email = Security::sanitizeString($_POST['email']);
    
    if (Security::validateEmail($email)) {
        // Usar consultas preparadas para evitar SQL Injection
        $sql = "INSERT INTO users (username, email) VALUES (?, ?)";
        $params = [$username, $email];
        $stmt = Security::prepareQuery($mysqli, $sql, $params);
        
        // Ejemplo de manejo de contraseñas
        $password = $_POST['password'];
        $hashedPassword = Security::hashPassword($password);

        echo "Usuario creado con éxito";
    } else {
        echo "Correo electrónico inválido";
    }
} else {
    // Mostrar formulario
    ?>
    <form method="POST" action="">
        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Registrarse</button>
    </form>
    <?php
}
?>
