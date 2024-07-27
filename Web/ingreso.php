<?php

session_start();
$user = $_SESSION['username'];

echo "<h2>Bienvenido $user </h2>";
?>