<?php
$Conection = pg_connect("host=localhost port=5432 dbname=MansionOrozco user=postgres password=Ahsy1zhdg123") or die ("No se puede conectar con el servidor");

if (!$Conection) {
    echo "Error en la conexion con la base de datos";
    exit;
}

?>
