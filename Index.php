<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/UG6swU2Im1vVX05Vk9ABhg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        /* Colores actualizados para coincidir con la página de trámites */
        :root {
          --primary: #1a4d8f;
          --secondary: #2563eb;
          --dark: #222;
          --light: #f4f6fa;
          --error: #ff4444;
          --transition: all 0.3s ease;
        }

        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Segoe UI', Arial, sans-serif;
        }

        body {
          background-color: #f4f6fa;
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
          padding: 20px;
        }

        form {
          width: 100%;
          max-width: 450px;
          background: #fff;
          padding: 2.5rem;
          border-radius: 10px;
          box-shadow: 0 2px 12px rgba(0,0,0,0.08);
          color: var(--dark);
          transform: translateY(0);
          transition: var(--transition);
        }

        form:hover {
          transform: translateY(-2px);
          box-shadow: 0 4px 20px rgba(0,0,0,0.12);
        }

        h1 {
          text-align: center;
          margin-bottom: 1.5rem;
          font-size: 1.8rem;
          color: var(--primary);
          position: relative;
          padding-bottom: 10px;
        }

        h1::after {
          content: '';
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
          width: 80px;
          height: 3px;
          background: linear-gradient(90deg, var(--primary), var(--secondary));
          border-radius: 3px;
        }

        hr {
          border: none;
          height: 1px;
          background: linear-gradient(90deg, transparent, rgba(26, 77, 143, 0.3), transparent);
          margin: 1.5rem 0;
        }

        .input-group {
          position: relative;
          margin-bottom: 1.8rem;
        }

        .input-group i {
          position: absolute;
          left: 15px;
          top: 50%;
          transform: translateY(-50%);
          color: var(--primary);
          font-size: 1.1rem;
          transition: var(--transition);
          z-index: 1;
        }

        .input-group label {
          display: block;
          margin-bottom: 0.5rem;
          font-size: 0.9rem;
          color: var(--primary);
          font-weight: 500;
          padding-left: 5px;
        }

        .input-group input {
          width: 100%;
          padding: 12px 15px 12px 45px;
          border-radius: 4px;
          border: 1px solid #bfc9d9;
          background: #fff;
          color: var(--dark);
          font-size: 1rem;
          transition: var(--transition);
        }

        .input-group input:focus {
          outline: none;
          border-color: var(--primary);
          background: #fff;
          box-shadow: 0 0 0 3px rgba(26, 77, 143, 0.1);
        }

        .input-group input::placeholder {
          color: #999;
        }

        .input-group input:focus + i {
          color: var(--secondary);
          transform: translateY(-50%) scale(1.1);
        }

        .error {
          background: var(--error);
          color: white;
          padding: 12px;
          border-radius: 8px;
          margin-bottom: 1.5rem;
          text-align: center;
          font-size: 0.9rem;
          animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
          from { opacity: 0; transform: translateY(-10px); }
          to { opacity: 1; transform: translateY(0); }
        }

        .button-group {
          display: flex;
          gap: 15px;
          margin-top: 2rem;
        }

        button, .btn-registro {
          flex: 1;
          padding: 12px;
          border-radius: 8px;
          font-weight: 600;
          font-size: 1rem;
          cursor: pointer;
          transition: var(--transition);
          text-align: center;
        }

        button {
          background: var(--primary);
          color: #fff;
          border: none;
        }

        button:hover {
          background: #163a6b;
          transform: translateY(-2px);
          box-shadow: 0 5px 15px rgba(26, 77, 143, 0.3);
        }

        .btn-registro {
          background: #fff;
          color: var(--primary);
          border: 2px solid var(--primary);
          text-decoration: none;
          display: flex;
          align-items: center;
          justify-content: center;
        }

        .btn-registro:hover {
          background: var(--primary);
          color: #fff;
          transform: translateY(-2px);
          box-shadow: 0 5px 15px rgba(26, 77, 143, 0.3);
        }

        @media (max-width: 480px) {
          form {
            padding: 1.8rem;
          }
          
          .button-group {
            flex-direction: column;
          }
          
          button, .btn-registro {
            width: 100%;
          }
        }
    </style>
</head>  
<body>
    <form action="IniciarSesion.php" method="POST">
        <h1>INICIAR SESIÓN</h1>
        <hr>
        
        <!-- Mostrar errores -->
        <?php if(isset($_GET['error'])): ?>
            <p class="error">
                <?= htmlspecialchars($_GET['error']) ?>
            </p> 
        <?php endif; ?>
        
        <!-- Campo Usuario -->
        <div class="input-group">
            <label>Correo</label>
            <input type="text" name="Correo" placeholder="Correo" required>
            <i class="fa-solid fa-user"></i>
        </div>
        
        <!-- Campo Clave -->
        <div class="input-group">
            <label>Clave</label>
            <input type="password" name="Clave" placeholder="Clave" required>
            <i class="fa-solid fa-unlock"></i>
        </div>
        <hr>
        
        <!-- Contenedor de botones -->
        <div class="button-group">
            <button type="submit">Iniciar sesión</button>
            <!-- Versión corregida -->
<a href="registro.php" class="btn-registro">Registrarse</a>

        </div>
    </form>
</body>
</html>