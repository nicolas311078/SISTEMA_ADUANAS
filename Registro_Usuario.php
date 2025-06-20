<?php
session_start();
include('Conexion.php');

if (isset($_POST['registrar'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validar datos
    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);
    $NombreCompleto = validate($_POST['NombreCompleto']);

    // Validar campos vacíos
    if (empty($Usuario)) {
        header("Location: Registro.php?error=El Usuario es requerido");
        exit();
    } elseif (empty($Clave)) {
        header("Location: Registro.php?error=La Contraseña es requerida");
        exit();
    } elseif (empty($NombreCompleto)) {
        header("Location: Registro.php?error=El Nombre Completo es requerido");
        exit();
    }

    // Verificar si el usuario ya existe
    $sql_check = "SELECT * FROM usuarios WHERE Usuario = '$Usuario'";
    $result_check = mysqli_query($conexion, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        header("Location: Registro.php?error=El usuario ya está registrado");
        exit();
    }

    // Encriptar contraseña (MD5 para compatibilidad con tu sistema actual)
    $Clave_encriptada = md5($Clave);

    // Insertar usuario
    $sql_insert = "INSERT INTO usuarios (Usuario, Clave, NombreCompleto) 
                   VALUES ('$Usuario', '$Clave_encriptada', '$NombreCompleto')";
    $result_insert = mysqli_query($conexion, $sql_insert);

    if ($result_insert) {
        header("Location: Index.php?success=Usuario registrado exitosamente");
        exit();
    } else {
        header("Location: Registro.php?error=Error al registrar: " . mysqli_error($conexion));
        exit();
    }
} else {
    header("Location: Registro.php");
    exit();
}
?>