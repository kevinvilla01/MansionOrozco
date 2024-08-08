<?php
require 'conection.php';

if (empty($_POST["user"]) || empty($_POST["password"])){
    echo "<script>alert('Los campos están vacíos');</script>";
}
else {
    $usr=$_POST["user"];
    $pass=$_POST["password"];
    $query=pg_query($conexion,"select * from USUARIOS where user='$usr' and passwd='$pass' ");

    if (pg_num_rows($query)>0)
        header("location:adm_panel.html");
    else{
        echo "<script>alert('ACCESO DENEGADO');</script>";
    }
}

?>