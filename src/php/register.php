<?php

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $confirm_contrasena = $_POST['confirm_contrasena'];
    $rol = $_POST['rol'];

    if ($contrasena != $confirm_contrasena) {
        echo "Las contraseñas no coinciden.";
        exit;
    }

    $conn = openConnection();

    $stmt = $conn->prepare("CALL sp_crearCuenta(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $usuario, $email, $contrasena, $rol);
    if ($stmt->execute()) {
        echo "Se creó la cuenta correctamente.";
        
    } else {
        echo "Error al crear la cuenta.";
    }

    $stmt->close();
    closeConnection($conn);
}
?>
