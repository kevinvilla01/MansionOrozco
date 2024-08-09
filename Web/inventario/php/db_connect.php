<?php
// db_connect.php
function dbConnect() {
    $host = "localhost";
    $dbname = "HOTELMO";
    $user = "postgres";
    $password = "Ahsy1zhdg123";

    $connection = pg_connect("host=$host dbname=$dbname user=$user password=$password");
    if (!$connection) {
        echo "Error: No se pudo conectar a la base de datos.";
        exit;
    }
    return $connection;
}
?>