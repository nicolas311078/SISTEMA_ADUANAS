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

    function validarRUT($rut) {
        // Eliminar puntos y guión
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v) {
            if($i==8) $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if($dvr == 11) $dvr = 0;
        if($dvr == 10) $dvr = 'K';
        if($dvr == strtoupper($dv)) return true;
        else return false;
    }

    function validarEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function validarTelefono($telefono) {
        // Validar formato chileno básico
        return preg_match('/^(\+56|56)?[2-9][0-9]{8}$/', preg_replace('/[\s\-\(\)]/', '', $telefono));
    }

    // Validar datos
    $Rut = validate($_POST['Rut']);
    $Nombres = validate($_POST['Nombres']);
    $Apellidos = validate($_POST['Apellidos']);  
    $Correo = validate($_POST['Correo']);
    $Clave = validate($_POST['Clave']);
    $Telefono = validate($_POST['Telefono']);

    $userData = [
        'Rut' => $Rut,
        'Nombres' => $Nombres,
        'Apellidos' => $Apellidos,
        'Correo' => $Correo,
        'Telefono' => $Telefono
    ];

    // Validar campos vacíos
    if (empty($Rut)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El RUT es requerido&" . http_build_query($userData));
        exit();
    } elseif (empty($Nombres)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=Los Nombres son requeridos&" . http_build_query($userData));
        exit();
    } elseif (empty($Apellidos)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=Los Apellidos son requeridos&" . http_build_query($userData));
        exit();
    } elseif (empty($Correo)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El Correo es requerido&" . http_build_query($userData));
        exit();
    } elseif (empty($Clave)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=La Contraseña es requerida&" . http_build_query($userData));
        exit();
    } elseif (empty($Telefono)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El Teléfono es requerido&" . http_build_query($userData));
        exit();
    }

    // Validaciones específicas
    if (!validarRUT($Rut)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El RUT ingresado no es válido&" . http_build_query($userData));
        exit();
    }

    if (!validarEmail($Correo)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El correo electrónico no es válido&" . http_build_query($userData));
        exit();
    }

    if (!validarTelefono($Telefono)) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El número de teléfono no es válido&" . http_build_query($userData));
        exit();
    }

    if (strlen($Clave) < 6) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=La contraseña debe tener al menos 6 caracteres&" . http_build_query($userData));
        exit();
    }

    // Limpiar formato del RUT para almacenamiento
    $RutLimpio = preg_replace('/[^k0-9]/i', '', $Rut);

    // Verificar si el RUT ya existe
    $sql_check_rut = "SELECT * FROM usuarios WHERE Rut = ?";
    $stmt_check_rut = mysqli_prepare($conexion, $sql_check_rut);
    mysqli_stmt_bind_param($stmt_check_rut, "s", $RutLimpio);
    mysqli_stmt_execute($stmt_check_rut);
    $result_check_rut = mysqli_stmt_get_result($stmt_check_rut);

    if (mysqli_num_rows($result_check_rut) > 0) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El RUT ya está registrado&" . http_build_query($userData));
        exit();
    }

    // Verificar si el correo ya existe
    $sql_check_correo = "SELECT * FROM usuarios WHERE Correo = ?";
    $stmt_check_correo = mysqli_prepare($conexion, $sql_check_correo);
    mysqli_stmt_bind_param($stmt_check_correo, "s", $Correo);
    mysqli_stmt_execute($stmt_check_correo);
    $result_check_correo = mysqli_stmt_get_result($stmt_check_correo);

    if (mysqli_num_rows($result_check_correo) > 0) {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=El correo electrónico ya está registrado&" . http_build_query($userData));
        exit();
    }

    // Encriptar contraseña usando password_hash (más seguro que MD5)
    $Clave_encriptada = password_hash($Clave, PASSWORD_DEFAULT);

    // Insertar usuario usando prepared statements (más seguro)
    $sql_insert = "INSERT INTO usuarios (Rut, Nombres, Apellidos, Correo, Clave, Telefono, FechaRegistro) 
                   VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt_insert = mysqli_prepare($conexion, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ssssss", $RutLimpio, $Nombres, $Apellidos, $Correo, $Clave_encriptada, $Telefono);
    $result_insert = mysqli_stmt_execute($stmt_insert);

    if ($result_insert) {
        header("Location: Index.php?success=Usuario registrado exitosamente");
        exit();
    } else {
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=Error al registrar usuario. Intente nuevamente&" . http_build_query($userData));
        exit();
    }
} else {
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>