<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUEVITOS CRUDITOS</title>
    <link rel="stylesheet" href="mundo.css">
</head>
<body>
    <div class="neon-container">
        <div class="login-form">
            <h2>Login</h2>

<?php
//validaciones para que el inicio de sesion sea correcto o incorrecto salga un mensage
 if (isset($_GET['error'])): ?>
<div class="error-message">
    <?php echo urldecode($_GET['error']); ?>
</div>
<?php endif; ?>

<?php if (isset($_SESSION['message'])): ?>
<div class="success-message">
    <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
</div>
<?php endif; ?>

            <form action="logueada.php" method="POST">
                <label for="username">Usuario:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
            <p>No tienes una cuenta? <a href="registrer.php">Regístrate</a></p>
        </div>
    </div>
</body>
</html>
