<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoIDEliminar = $_POST['productoIDEliminar'];

    $connection = dbConnect();

    $query = "DELETE FROM PRODUCTOS WHERE id_producto = '$productoIDEliminar'";
    $result = pg_query($connection, $query);

    if ($result) {
        echo "Producto eliminado exitosamente.";
    } else {
        echo "Error al eliminar el producto.";
    }

    pg_close($connection);
    header("Location: index.php");
    exit;
}
?>
