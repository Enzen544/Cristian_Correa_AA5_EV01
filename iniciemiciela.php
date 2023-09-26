<!DOCTYPE html>
<html>
<head>
    <title>crudito</title>
    <link rel="stylesheet" href="nuevo.css">
</head>
<body>
    <h1>Api</h1>

    <?php
    //otorga una alerta de inicio de sesion o autenticacion correcta
     echo "<script>alert('Autenticacion correcta')</script>"; ?>
    <form action="index.php" method="POST">
        <input type="submit" name="salir" value="Salir">
    </form>
</body>
</html>
