<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Declaración de Mascotas</title>
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

        /* Logo centrado */
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
        input[type="number"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e3f2fd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: #2a5298;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        select {
            cursor: pointer;
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

        .back-link {
            text-align: center;
            margin-top: 25px;
            color: #1e3c72;
        }

        .back-link a {
            color: #2a5298;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
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

        <h2>Declaración de Mascotas</h2>

        <form action="Declaracion_Mascotas.php" method="POST">
            <div class="form-group">
                <label for="NombreMascota">Nombre de la Mascota:</label>
                <input type="text" id="NombreMascota" name="NombreMascota" required>
            </div>

            <div class="form-group">
                <label for="Especie">Especie:</label>
                <select id="Especie" name="Especie" required>
                    <option value="">Seleccione una especie</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Ave">Ave</option>
                    <option value="Conejo">Conejo</option>
                    <option value="Hamster">Hámster</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Raza">Raza:</label>
                <input type="text" id="Raza" name="Raza" placeholder="Ej: Labrador, Siamés, etc." required>
            </div>

            <div class="form-group">
                <label for="Sexo">Sexo:</label>
                <select id="Sexo" name="Sexo" required>
                    <option value="">Seleccione</option>
                    <option value="Macho">Macho</option>
                    <option value="Hembra">Hembra</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Edad">Edad (años):</label>
                <input type="number" id="Edad" name="Edad" min="0" max="30" step="0.1" placeholder="Ej: 3.5" required>
            </div>

            <div class="form-group">
                <label for="Peso">Peso (kg):</label>
                <input type="number" id="Peso" name="Peso" min="0.1" max="100" step="0.1" placeholder="Ej: 15.5" required>
            </div>

            <div class="form-group">
                <label for="Color">Color/Descripción:</label>
                <input type="text" id="Color" name="Color" placeholder="Ej: Café con blanco" required>
            </div>

            <div class="form-group">
                <label for="NumeroMicrochip">Número de Microchip:</label>
                <input type="text" id="NumeroMicrochip" name="NumeroMicrochip" placeholder="Ej: 982000123456789">
            </div>

            <button type="submit" name="declarar">Declarar Mascota</button>
        </form>

        <p class="back-link"> <a href="Inicio.php">VOLVER AL INICIO</a></p>
    </div>
</body>
</html>