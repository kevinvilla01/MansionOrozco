<?php
require 'config.php';

$type = $_GET['type'];

switch($type) {
    case 'product':
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descipcion'];
        $categoria = $_POST['categoria'];
        $precio_unitario = $_POST['precio_unitario'];
        $stock_total = $_POST['stock_total'];
        $stock_min = $_POST['stock_min'];

        
}
?>