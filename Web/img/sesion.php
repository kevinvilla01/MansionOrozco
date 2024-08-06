<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare('SELECT * FROM USUARIOS WHERE username = :username');
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passwd'])) {
            $_SESSION['user_id'] = $user['id_usuario'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['rol'] = $user['rol'];
            header("Location: intranet.php");
            exit;
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        echo "Por favor complete ambos campos.";
    }
}
?>
