<?php
$host = 'localhost';
$db = 'prueba';
$user = 'postgres';
$pass = 'Ahsy1zhdg123';

$dsn = "pgsql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
