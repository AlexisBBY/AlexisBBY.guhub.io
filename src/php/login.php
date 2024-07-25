<?php
session_start();
include 'db_connection.php'; // Ajusta la ruta si es necesario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $conn = openConnection();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $usuario, $contrasena);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['rol'] = $user['rol']; // Asegúrate de que 'rol' sea el nombre correcto del campo
            header("Location: admin_or_cliente.php");
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    } else {
        echo "Error al ejecutar la consulta.";
    }

    $stmt->close();
    closeConnection($conn);
}
?>
