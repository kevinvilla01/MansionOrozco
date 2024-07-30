<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.html");
    exit;
}

// Resto del contenido de la página intranet
echo "Bienvenido, " . $_SESSION['username'];
?>
