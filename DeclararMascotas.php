<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Declarar Mascotas</title>
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
        input[type="date"],
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
        input[type="date"]:focus,
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

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            h2 {
                font-size: 24px;
            }

            .logo-top-left img {
                max-width: 60px;
            }
        }
    </style>
</head>
<body>
    <!-- Logo en esquina superior izquierda -->
    <div class="logo-top-left">
        <img src="https://via.placeholder.com/100x100/2a5298/ffffff?text=LOGO" 
             alt="Logo" 
             onerror="this.style.display='none'">
    </div>

    <div class="container">
        <h2>Declarar Mascotas</h2>

        <form action="declarar_mascotas.php" method="POST">
            <div class="form-group">
                <label for="nombre_mascota">Nombre de la Mascota:</label>
                <input type="text" id="nombre_mascota" name="nombre_mascota" required>
            </div>

            <div class="form-group">
                <label for="tipo_animal">Tipo de Animal:</label>
                <select id="tipo_animal" name="tipo_animal" required>
                    <option value="">Seleccione el tipo de animal</option>
                    <option value="perro">Perro</option>
                    <option value="gato">Gato</option>
                    <option value="ave">Ave</option>
                    <option value="conejo">Conejo</option>
                    