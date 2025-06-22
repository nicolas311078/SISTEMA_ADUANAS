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
<body>
    <form action="IniciarSesion.php" method="POST">
        <h1>INICIAR SESIÓN</h1>
        <hr>
        <div class="input-group">
            <label>Correo electrónico</label>
            <input type="text" name="Correo" placeholder="Ingrese su correo" required>
            <i class="fa-solid fa-user"></i>
        </div>
        <div class="input-group">
            <label>Clave</label>
            <input type="password" name="Clave" placeholder="Clave" required>
            <i class="fa-solid fa-unlock"></i>
        </div>
        <hr>
        <div class="button-group">
            <button type="submit">Iniciar sesión</button>
            <a href="registro.php" class="btn-registro">Registrarse</a>
        </div>
    </form>
</body>
</html>