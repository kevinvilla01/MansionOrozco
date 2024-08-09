<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eliminarnombre = $_POST['eliminarnombre'];
    $eliminarid = $_POST['eliminarid'];

    $connection = dbConnect();

    $query = "DELETE FROM empleado WHERE nombre = '$eliminarnombre' OR id_empleado = '$eliminarid'";
    $result = pg_query($connection, $query);

    if ($result) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario.";
    }

    pg_close($connection);
    header("Location: index.php");
    exit;
}
?>
