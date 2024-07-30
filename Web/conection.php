<?php
// Configuración de la base de datos
$host = 'localhost'; // o la dirección de tu servidor de base de datos
$dbname = 'MansionOrozco';
$user = 'postgres';
$password = 'Ahsy1zhdg123';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
