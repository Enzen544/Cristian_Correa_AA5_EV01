<?php
session_start(); // Inicia la sesión

if (isset($_POST['login'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['password'];
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "123456";
    $dbname = "loginn";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    $check_query = "SELECT * FROM usuarios WHERE nombre='$nombre'";
    $result = $conn->query($check_query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($contraseña == $row['contraseña']) {
            header("Location: iniciemiciela.php");
            exit();
        } else {
            // Codifica el mensaje de error y redirige al usuario
            $error = urlencode("Contraseña incorrecta. Por favor, inténtalo de nuevo.");
            header("Location: index.php?error=$error");
            exit();
        }
    } else {
        // Codifica el mensaje de error y redirige al usuario
        $error = urlencode("Usuario no encontrado. Por favor, regístrate antes de iniciar sesión.");
        header("Location: index.php?error=$error");
        exit();
    }

    $conn->close();
}
?>
