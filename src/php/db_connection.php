<?php
function openConnection() {
    $servername = "localhost:3306";
    $username = "root";
    $password = "";
    $dbname = "coboshub";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

function closeConnection($conn) {
    $conn->close();
}
?>
