<?php
session_start();
include('Conexion.php');

if (isset($_POST['Correo']) && isset($_POST['Clave'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Correo = validate($_POST['Correo']);
    $Clave = validate($_POST['Clave']);

    // Validar campos vacíos
    if (empty($Correo)) {
        header("Location: Index.php?error=El correo es requerido");
        exit();
    } elseif (empty($Clave)) {
        header("Location: Index.php?error=La contraseña es requerida");
        exit();
    }

    // Consulta preparada para prevenir SQL injection
    $sql = "SELECT * FROM usuarios WHERE Correo = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $Correo);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // Verificar contraseña con password_verify (para contraseñas hasheadas con password_hash)
        if (password_verify($Clave, $row['Clave'])) {
            // Verificar si el usuario está activo
            if ($row['Activo'] != 1) {
                header("Location: Index.php?error=Tu cuenta está desactivada");
                exit();
            }

            // Restablecer intentos fallidos si existen
            if ($row['IntentosFallidos'] > 0) {
                $sql_reset = "UPDATE usuarios SET IntentosFallidos = 0 WHERE id = ?";
                $stmt_reset = mysqli_prepare($conexion, $sql_reset);
                mysqli_stmt_bind_param($stmt_reset, "i", $row['id']);
                mysqli_stmt_execute($stmt_reset);
            }

            // Actualizar último acceso
            $sql_update = "UPDATE usuarios SET UltimoAcceso = NOW() WHERE id = ?";
            $stmt_update = mysqli_prepare($conexion, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "i", $row['id']);
            mysqli_stmt_execute($stmt_update);

            // Crear sesión
            $_SESSION['Id'] = $row['id'];
            $_SESSION['Correo'] = $row['Correo'];
            $_SESSION['Nombre_completo'] = $row['Nombres'] . ' ' . $row['Apellidos'];
            $_SESSION['Rut'] = $row['Rut'];
            
            header("Location: Inicio.php");
            exit();
        } else {
            // Incrementar intentos fallidos
            $intentos = $row['IntentosFallidos'] + 1;
            $sql_intentos = "UPDATE usuarios SET IntentosFallidos = ? WHERE id = ?";
            $stmt_intentos = mysqli_prepare($conexion, $sql_intentos);
            mysqli_stmt_bind_param($stmt_intentos, "ii", $intentos, $row['id']);
            mysqli_stmt_execute($stmt_intentos);

            // Bloquear cuenta después de 3 intentos fallidos
            if ($intentos >= 3) {
                $sql_bloquear = "UPDATE usuarios SET Activo = 0 WHERE id = ?";
                $stmt_bloquear = mysqli_prepare($conexion, $sql_bloquear);
                mysqli_stmt_bind_param($stmt_bloquear, "i", $row['id']);
                mysqli_stmt_execute($stmt_bloquear);
                
                header("Location: Index.php?error=Cuenta bloqueada por demasiados intentos fallidos");
            } else {
                header("Location: Index.php?error=Correo o contraseña incorrectos");
            }
            exit();
        }
    } else {
        header("Location: Index.php?error=Correo o contraseña incorrectos");
        exit();
    }
} else {
    header("Location: Index.php");
    exit();
}
?>