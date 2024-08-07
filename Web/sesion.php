<?php
require 'conection.php';

if (empty($_POST["user"]) || empty($_POST["password"])){
    echo "<script>alert('Los campos están vacíos');</script>";
}
else {
    $nombre=$_POST["user"];
    $contraseña=$_POST["password"];
    $mysql=pg_query($conexion,"select * from empleado where nombre='$nombre' and contraseña='$contraseña' ");

    if (pg_num_rows($mysql)>0)
        header("location:Administrador.html");
    else{
        echo "<script>alert('ACCESO DENEGADO');</script>";
    }
}
?>