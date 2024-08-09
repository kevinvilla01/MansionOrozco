<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUser = $_POST['nombreUser'];
    $apellidoUser = $_POST['apellidoUser'];
    $tel = $_POST['tel'];
    $emailUser = $_POST['emailUser'];
    $password = $_POST['password'];
    $userempleado = $_POST['userempleado'];
    $puesto = $_POST['puesto'];

    $connection = dbConnect();

    $query = "INSERT INTO USUARIOS (nombre, apellido, correo, telefono, rol, username, passwd) VALUES ('$nombreUser', '$apellidoUser', '$emailUser', 'tel', '$puesto', '$userempleado', 'password')";
    $result = pg_query($connection, $query);

    if ($result) {
        echo "Usuario agregado exitosamente.";
    } else {
        echo "Error al agregar el usuario.";
    }

    pg_close($connection);
    header("Location: index.php");
    exit;
}
?>
