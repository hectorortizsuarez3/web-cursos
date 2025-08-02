<?php
$servername="localhost";
$username="root";
$password="1234";
$database="proyecto-intermodular";
$port = 3307;

//Crear conexión
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $database, $port);
$conn->set_charset("utf8mb4");

//chequear conexión

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
