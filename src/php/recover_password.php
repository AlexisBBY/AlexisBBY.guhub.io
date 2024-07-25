<?php
// archivo: recover_password.php

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Abre la conexión
    $conn = openConnection();

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("CALL sp_recuperarClave(?)");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el correo existe
    if ($result->num_rows > 0) {
        echo "Correo enviado.";
    } else {
        echo "Correo no registrado.";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    closeConnection($conn);
}
?>
