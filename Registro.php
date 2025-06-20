<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>Registro de Usuario</h2>

    <!-- Mostrar mensajes de error/éxito -->
    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php endif; ?>

    <?php if (isset($_GET['success'])): ?>
        <p class="success"><?= htmlspecialchars($_GET['success']) ?></p>
    <?php endif; ?>

    <form action="Registro_Usuario.php" method="POST">
        <div>
            <label for="Usuario">Usuario:</label>
            <input type="text" name="Usuario" required>
        </div>

        <div>
            <label for="Clave">Contraseña:</label>
            <input type="password" name="Clave" required>
        </div>

        <div>
            <label for="NombreCompleto">Nombre Completo:</label>
            <input type="text" name="NombreCompleto" required>
        </div>

        <button type="submit" name="registrar">Registrarse</button>
    </form>

    <p>¿Ya tienes cuenta? <a href="Index.php">Inicia Sesión</a></p>
</body>
</html>