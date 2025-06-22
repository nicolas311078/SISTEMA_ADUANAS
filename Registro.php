<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        /* Logo en esquina superior izquierda */
        .logo-top-left {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .logo-top-left img {
            max-width: 80px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(30, 60, 114, 0.2);
            width: 100%;
            max-width: 450px;
            border: 2px solid #2a5298;
        }

        /* Logo centrado (opción actual) */
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 200px;
            height: auto;
            margin-bottom: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #1e3c72;
            font-size: 28px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1e3c72;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e3f2fd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #2a5298;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(135deg, #0d2142 0%, #1a4078 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #1e3c72;
        }

        .login-link a {
            color: #2a5298;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
            color: #1e3c72;
        }

        .error {
            background-color: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #c62828;
        }

        .success {
            background-color: #e8f5e8;
            color: #2e7d32;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #2e7d32;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            h2 {
                font-size: 24px;
            }

            /* Logo más pequeño en móvil */
            .logo-top-left img {
                max-width: 60px;
            }
        }
    </style>
</head>
</script>
</body>
</html>
<body>
    <!-- Logo en esquina superior izquierda -->
    <div class="logo-top-left">
        <img src="https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=100068943858647" 
             alt="Logo" 
             onerror="this.style.display='none'">
    </div>

    <div class="container">
        <div class="logo-container">
            <!-- Logo oficial del Servicio Nacional de Aduanas -->
            <img src="https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=100068943858647" 
                 alt="Servicio Nacional de Aduanas - Chile" 
                 class="logo"
                 onerror="this.style.display='none'">
        </div>

        <h2>Registro de Usuario</h2>

        <form action="Registro_Usuario.php" method="POST">
            <div class="form-group">
                <label for="Rut">RUT:</label>
                <input type="text" id="Rut" name="Rut" placeholder="12.345.678-9" required>
            </div>

            <div class="form-group">
                <label for="Nombres">Nombres:</label>
                <input type="text" id="Nombres" name="Nombres" required>
            </div>

            <div class="form-group">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" id="Apellidos" name="Apellidos" required>
            </div>

            <div class="form-group">
                <label for="Correo">Correo Electrónico:</label>
                <input type="email" id="Correo" name="Correo" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
                <label for="Clave">Contraseña:</label>
                <input type="password" id="Clave" name="Clave" required>
            </div>

            <div class="form-group">
                <label for="Telefono">Número de Teléfono:</label>
                <input type="tel" id="Telefono" name="Telefono" placeholder="+56 9 1234 5678" required>
            </div>

            <button type="submit" name="registrar">Registrarse</button>
        </form>

        <p class="login-link">¿Ya tienes cuenta? <a href="Index.php">Inicia Sesión</a></p>
    </div>
</body>
</html>