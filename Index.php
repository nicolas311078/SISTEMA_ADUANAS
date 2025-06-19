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
    <tittle>Inicio de sesion</tittle>
</head>  
<body>
    <form action="IniciarSesion.php" method="POST" >
        <h1>INICIAR SESION</h1>
        <hr>
        <?php
            if(isset($_GET['error'])){
             ?>
            <p class="Error">
                <?php
                echo $_GET["error"]
                ?>
            </p> 
        <?php  
            }
        ?>
        <i class="fa-solid fa-user"></i>
        <label> Usuario </label>
        <input type="text" name=" Usuario" placeholder="Nombre de usuario">
        
        <i class="fa-solid fa-unlock"></i>
        <label> Clave </label>
        <input type="password" name="Clave" placeholder="Clave">
        <hr>
        <button type="submit"> Iniciar sesion </button>
        <a href="CrearCuenta.php"?>Crear Cuenta</a>
    
    </form>
</body>



</head>


    