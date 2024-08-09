<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreUser = $_POST['nombreUser'];
    $apellidoUser = $_POST['apellidoUser'];
    $tel = $_POST['tel'];
    $emailUser = $_POST['emailUser'];
    $password = $_POST['password'];
    $idempleado = $_POST['idempleado'];
    $puesto = $_POST['puesto'];
    $domicilioUser = $_POST['domicilioUser'];
    $edadUser = $_POST['edadUser'];

    $connection = dbConnect();

    $query = "INSERT INTO empleado (nombre, apellido, tel, email, contraseña, id_empleado, puesto, domicilio, edad) VALUES ('$nombreUser', '$apellidoUser', '$tel', '$emailUser', '$password', '$idempleado', '$puesto', '$domicilioUser', '$edadUser')";
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
