<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>

        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <p class="success"><?= htmlspecialchars($_GET['success']) ?></p>
        <?php endif; ?>

        <form action="Registro_Usuario.php" method="POST">
            <div class="form-group">
                <label for="Usuario">Usuario:</label>
                <input type="text" id="Usuario" name="Usuario" required>
            </div>

            <div class="form-group">
                <label for="Clave">Contraseña:</label>
                <input type="password" id="Clave" name="Clave" required>
            </div>

            <div class="form-group">
                <label for="NombreCompleto">Nombre Completo:</label>
                <input type="text" id="NombreCompleto" name="NombreCompleto" required>
            </div>

            <button type="submit" name="registrar">Registrarse</button>
        </form>

        <p class="login-link">¿Ya tienes cuenta? <a href="Index.php">Inicia Sesión</a></p>
    </div>
</body>
</html>