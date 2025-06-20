 <!DOCTYPE HTML>
    <HTML LANG= "en">
    <head>
    <meta charset ="UTF-8">
    <meta http-equiuv="X-UA.Compatible" content ="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3-a/dist/css/boostrap.min.css" rel ="stylesheet"
    integrity ="sha384-1BmE4kWBq78iYhFld6x8j6b6d" crossorigin="anonymous">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <i class="fa-solid fa-user"></i>
            <label>Usuario</label>
            <input type="text" name="Usuario" placeholder="Nombre de usuario" required>
        </div>
        
        <!-- Campo Clave -->
        <div class="input-group">
            <i class="fa-solid fa-unlock"></i>
            <label>Clave</label>
            <input type="password" name="Clave" placeholder="Clave" required>
        </div>
        <hr>
        
        <!-- Contenedor de botones -->
        <div class="button-group">
            <button type="submit">Iniciar sesión</button>
            <a href="Registro_Usuario.php" class="btn-registro">Registrarse</a>
        </div>
    </form>
</body>
</head>


    