<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="mundo.css">
</head>
<body>
    <div class="container">
        <form action="registro.php" method="POST" class="form">
            <h2>Registro</h2>

            <?php 
            //al ingresar si es correcto nos dara un mensaje en verde si es incorrecto saldra error en la barra de arriba 
            //y en el recuadro nos saldra en rojo la razon
            session_start(); ?>
            <?php if (isset($_SESSION['error'])): ?>
            <div style="background-color: red;">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['message'])): ?>
            <div style="background-color: green;">
                <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
            </div>
            <?php endif; ?>

            <div class="input-group">
                <label for="username">Usuario:</label>
                <input type="text" id="nombre" name="nombre" required>

            </div>
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="telefono">telefono:</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            <div class="input-group">
                <label for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" required>
            </div>

            <button type="submit" name="register">Registrarse</button>
            <p>¿Ya tienes una cuenta? <a href="index.php">Iniciar Sesión</a></p>
        </form>
    </div>
</body>
</html>

