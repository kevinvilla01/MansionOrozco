<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoID = $_POST['productoID'];
    $productoNombre = $_POST['productoNombre'];
    $productoDescripcion = $_POST['productoDescripcion'];
    $productoCantidad = $_POST['productoCantidad'];
    $productoPrecio = $_POST['productoPrecio'];
    $productoCategoria = $_POST['productoCategoria'];

    $connection = dbConnect();

    $query = "INSERT INTO PRODUCTOS (id_producto, producto, descripcion, cantidad, precio, categoria) VALUES ('$productoID', '$productoNombre', '$productoDescripcion', '$productoCantidad', '$productoPrecio', '$productoCategoria')";
    $result = pg_query($connection, $query);

    if ($result) {
        echo "Producto agregado exitosamente.";
    } else {
        echo "Error al agregar el producto.";
    }

    pg_close($connection);
    header("Location: index.php");
    exit;
}
?>
