<?php
require 'conection.php';

session_start();

if (empty($_POST["username"]) || empty($_POST["password"])){
    echo "<script>alert('Los campos están vacíos');</script>";
}
else {
    $usr=$_POST["username"];
    $pass=$_POST["password"];
    $query=pg_query($Conection,"SELECT * FROM USUARIOS WHERE username='$usr' AND passwd='$pass'");

    if (pg_num_rows($query)>0)
        header("location:inventario");
    else{
        echo "<script>alert('ACCESO DENEGADO');</script>";
    }
}

?>