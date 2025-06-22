<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Servicio Nacional de Aduanas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
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

        /* Cerrar sesión en esquina superior derecha */
        .logout-top-right {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .logout-btn {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 10px rgba(220, 53, 69, 0.3);
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #c82333 0%, #a71e2a 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
            color: white;
            text-decoration: none;
        }

        .container {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(30, 60, 114, 0.15);
            width: 100%;
            max-width: 600px;
            border: 2px solid #2a5298;
            text-align: center;
        }

        /* Logo centrado */
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 250px;
            height: auto;
            margin-bottom: 15px;
        }

        h1 {
            color: #1e3c72;
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(30, 60, 114, 0.1);
        }

        .subtitle {
            color: #666;
            font-size: 18px;
            margin-bottom: 40px;
            font-style: italic;
        }

        .services-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
        }

        .service-card {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 30px 20px;
            border-radius: 15px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.2);
            position: relative;
            overflow: hidden;
        }

        .service-card:hover {
            background: linear-gradient(135deg, #0d2142 0%, #1a4078 100%);
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(30, 60, 114, 0.3);
            color: white;
            text-decoration: none;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            transform: rotate(45deg);
            transition: all 0.5s;
            opacity: 0;
        }

        .service-card:hover::before {
            animation: shine 0.5s ease-in-out;
        }

        @keyframes shine {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); opacity: 0; }
        }

        .service-icon {
            font-size: 48px;
            margin-bottom: 15px;
            display: block;
        }

        .service-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .service-description {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.4;
        }

        .welcome-message {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1565c0;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            border-left: 5px solid #1565c0;
        }

        .welcome-message h3 {
            margin-bottom: 10px;
            color: #0d47a1;
        }

        .footer-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 40px 30px;
                margin: 10px;
            }
            
            h1 {
                font-size: 28px;
            }

            .subtitle {
                font-size: 16px;
            }

            .services-container {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .service-card {
                padding: 25px 15px;
            }

            .service-icon {
                font-size: 40px;
            }

            .service-title {
                font-size: 16px;
            }

            /* Logo más pequeño en móvil */
            .logo-top-left img {
                max-width: 60px;
            }

            .logout-btn {
                padding: 8px 15px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .logout-top-right {
                position: static;
                margin-bottom: 20px;
                text-align: center;
            }

            .logo-top-left {
                position: static;
                margin-bottom: 20px;
                text-align: center;
            }

            body {
                flex-direction: column;
                justify-content: flex-start;
                padding-top: 20px;
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

    <!-- Cerrar sesión en esquina superior derecha -->
    <div class="logout-top-right">
        <a href="CerrarSesion.php" class="logout-btn">
            🚪 Cerrar Sesión
        </a>
    </div>

    <div class="container">
        <div class="logo-container">
            <!-- Logo oficial del Servicio Nacional de Aduanas -->
            <img src="https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=100068943858647" 
                 alt="Servicio Nacional de Aduanas - Chile" 
                 class="logo"
                 onerror="this.style.display='none'">
        </div>

        <h1>Servicio Nacional de Aduanas</h1>
        <p class="subtitle">Portal de Trámites y Servicios</p>

        <div class="welcome-message">
            <h3>¡Bienvenido!</h3>
            <p>Accede a nuestros servicios digitales de forma rápida y segura. Selecciona el trámite que necesitas realizar.</p>
        </div>

        <div class="services-container">
            <a href="TramitesPermisosmenores.php" class="service-card">
                <span class="service-icon">📋</span>
                <div class="service-title">Trámites y Permisos</div>
                <div class="service-description">Gestiona permisos menores y documentación aduanera</div>
            </a>

            <a href="DeclararMascotas.php" class="service-card">
                <span class="service-icon">🐕</span>
                <div class="service-title">Declarar Mascotas</div>
                <div class="service-description">Registra el ingreso o salida de mascotas del país</div>
            </a>
        </div>

        <div class="footer-info">
            <p><strong>Horario de atención:</strong> Lunes a Viernes 08:00 - 18:00 hrs</p>
            <p><strong>Mesa de ayuda:</strong> 600 872 2728</p>
        </div>
    </div>

    <script>
        // Efecto de carga suave
        document.addEventListener('DOMContentLoaded', function() {
            const container = document.querySelector('.container');
            container.style.opacity = '0';
            container.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                container.style.transition = 'all 0.5s ease';
                container.style.opacity = '1';
                container.style.transform = 'translateY(0)';
            }, 100);
        });

        // Confirmación antes de cerrar sesión
        document.querySelector('.logout-btn').addEventListener('click', function(e) {
            if (!confirm('¿Está seguro que desea cerrar sesión?')) {
                e.preventDefault();
            }
        });
    </script>
</body>
</html>