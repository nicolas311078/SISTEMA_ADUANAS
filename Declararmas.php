<?php
// declarar_mascotas.php
session_start();

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'db_sistema_aduanas';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['declarar'])) {
    
    // Validar y limpiar datos
    $nombre_mascota = trim($_POST['nombre_mascota']);
    $tipo_animal = trim($_POST['tipo_animal']);
    $raza = trim($_POST['raza']);
    $edad = intval($_POST['edad']);
    $sexo = trim($_POST['sexo']);
    $color = trim($_POST['color']);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $vacunado = trim($_POST['vacunado']);
    $observaciones = trim($_POST['observaciones']);
    
    // Validaciones básicas
    $errores = [];
    
    if (empty($nombre_mascota)) {
        $errores[] = "El nombre de la mascota es requerido";
    }
    
    if (empty($tipo_animal)) {
        $errores[] = "Debe seleccionar el tipo de animal";
    }
    
    if (empty($raza)) {
        $errores[] = "La raza es requerida";
    }
    
    if ($edad < 0 || $edad > 30) {
        $errores[] = "La edad debe estar entre 0 y 30 años";
    }
    
    if (empty($sexo)) {
        $errores[] = "Debe seleccionar el sexo";
    }
    
    if (empty($color)) {
        $errores[] = "El color es requerido";
    }
    
    if (empty($fecha_nacimiento)) {
        $errores[] = "La fecha de nacimiento es requerida";
    }
    
    if (empty($vacunado)) {
        $errores[] = "Debe indicar el estado de vacunación";
    }
    
    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        try {
            $sql = "INSERT INTO mascotas (nombre, tipo_animal, raza, edad, sexo, color, fecha_nacimiento, vacunado, observaciones, fecha_registro) 
                    VALUES (:nombre, :tipo_animal, :raza, :edad, :sexo, :color, :fecha_nacimiento, :vacunado, :observaciones, NOW())";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre_mascota,
                ':tipo_animal' => $tipo_animal,
                ':raza' => $raza,
                ':edad' => $edad,
                ':sexo' => $sexo,
                ':color' => $color,
                ':fecha_nacimiento' => $fecha_nacimiento,
                ':vacunado' => $vacunado,
                ':observaciones' => $observaciones
            ]);
            
            $mensaje_exito = "¡Mascota registrada exitosamente!";
            
        } catch(PDOException $e) {
            $errores[] = "Error al registrar la mascota: " . $e->getMessage();
        }
    }
}

// Obtener todas las mascotas registradas para mostrar
try {
    $sql = "SELECT * FROM mascotas ORDER BY fecha_registro DESC";
    $stmt = $pdo->query($sql);
    $mascotas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $mascotas = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Declarar Mascotas</title>
</head>
<body>
    <div class="container">
        <h1>Sistema de Registro de Mascotas</h1>
        
        <?php if (isset($mensaje_exito)): ?>
            <div class="mensaje-exito">
                <?php echo $mensaje_exito; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($errores)): ?>
            <div class="errores">
                <strong>Errores encontrados:</strong>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <h2>Mascotas Registradas</h2>
        
        <?php if (empty($mascotas)): ?>
            <p class="sin-mascotas">No hay mascotas registradas aún.</p>
        <?php else: ?>
            <table class="tabla-mascotas">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Raza</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Color</th>
                        <th>Vacunado</th>
                        <th>Fecha Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mascotas as $mascota): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($mascota['nombre']); ?></td>
                            <td><?php echo htmlspecialchars(ucfirst($mascota['tipo_animal'])); ?></td>
                            <td><?php echo htmlspecialchars($mascota['raza']); ?></td>
                            <td><?php echo $mascota['edad']; ?> años</td>
                            <td><?php echo htmlspecialchars(ucfirst($mascota['sexo'])); ?></td>
                            <td><?php echo htmlspecialchars($mascota['color']); ?></td>
                            <td><?php echo htmlspecialchars(ucfirst($mascota['vacunado'])); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($mascota['fecha_registro'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <a href="index.php" class="btn-volver">← Volver al Formulario</a>
    </div>
</body>
</html>