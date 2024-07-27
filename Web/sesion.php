<?php
require 'conection.php';

session_start();

$user = $_POST['username'];
$pw = $_POST['password'];

$query = ("SELECT * FROM USUARIOS WHERE username='$user' AND passwd='$pw'");

$consulta = pg_query($conection, $query);
$cantidad = pg_num_rows($consulta);

if($cantidad > 0){

    $_SESSION['username']=$user;
    header('Location:ingreso.php');

}

else{
    echo "Datos incorrectos";
}

?>