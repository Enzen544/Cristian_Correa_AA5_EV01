<?php
session_start(); // Inicia la sesión

if (isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['password'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
//validamos para entrar a nuestra base de datos
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
    //nombre no puede existir 2 veces o sera error en el registro
    if ($result->num_rows > 0) {
        $_SESSION['error'] = "El usuario ya existe. Por favor, elige otro nombre de usuario.";
    } else {
        $insert_query = "INSERT INTO usuarios (nombre, contraseña, telefono, correo) VALUES ('$nombre', '$contraseña', '$telefono', '$correo')";

        if ($conn->query($insert_query) === TRUE) {
            $_SESSION['message'] = "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            $_SESSION['error'] = "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    header("Location: registrer.php"); // Redirige de nuevo a la página de registro
    exit();

    $conn->close();
}
?>

