<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoNombre = $_POST['productoNombre'];
    $productoDescripcion = $_POST['productoDescripcion'];
    $productoCategoria = $_POST['productoCategoria'];
    $productoPrecio = $_POST['productoPrecio'];
    $productoStockTotal = $_POST['productoStockTotal'];
    $productoStockMin = $_POST['productoStockMin'];

    $connection = dbConnect();

    $query = "INSERT INTO PRODUCTOS (nombre, descripcion, categoria, precio_unitario, stock_total, stock_min) VALUES ('$productoNombre', '$productoDescripcion', '$productoCategoria', '$productoPrecio', '$productoStockTotal', 'productoStockMin')";
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
