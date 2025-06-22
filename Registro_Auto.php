<?php
// Iniciar sesión
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sistema_aduanas";

$autos = [];
$mensaje = '';
$tab_actual = $_GET['tab'] ?? 'registro';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Procesar formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'] ?? '';
        
        if ($action == 'crear') {
            $stmt = $pdo->prepare("INSERT INTO autos (marca, modelo, año, color, patente, numero_chasis, numero_motor, cilindrada, combustible, propietario, rut_propietario, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Activo')");
            
            if ($stmt->execute([
                $_POST['marca'],
                $_POST['modelo'],
                $_POST['año'],
                $_POST['color'],
                $_POST['patente'],
                $_POST['numero_chasis'],
                $_POST['numero_motor'],
                $_POST['cilindrada'],
                $_POST['combustible'],
                $_POST['propietario'],
                $_POST['rut_propietario']
            ])) {
                $mensaje = "<div class='alert alert-success'>¡Auto registrado exitosamente!</div>";
            } else {
                $mensaje = "<div class='alert alert-error'>Error al registrar el auto.</div>";
            }
        }
        
        if ($action == 'eliminar') {
            $stmt = $pdo->prepare("UPDATE autos SET estado = 'Inactivo' WHERE id = ?");
            if ($stmt->execute([$_POST['id']])) {
                $mensaje = "<div class='alert alert-success'>Auto eliminado exitosamente!</div>";
            }
        }
    }
    
    // Obtener autos
    $busqueda = $_GET['buscar'] ?? '';
    if ($busqueda) {
        $stmt = $pdo->prepare("SELECT * FROM autos WHERE marca LIKE ? OR modelo LIKE ? OR patente LIKE ? OR propietario LIKE ? ORDER BY fecha_registro DESC");
        $busqueda_param = "%$busqueda%";
        $stmt->execute([$busqueda_param, $busqueda_param, $busqueda_param, $busqueda_param]);
    } else {
        $stmt = $pdo->query("SELECT * FROM autos ORDER BY fecha_registro DESC");
    }
    $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    $mensaje = "<div class='alert alert-error'>Error de base de datos: " . $e->getMessage() . "</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Autos</title>
    <style>
        :root {
            --primary: #1a4d8f;
            --secondary: #2563eb;
            --dark: #222;
            --light: #f4f6fa;
            --error: #ff4444;
            --success: #22c55e;
            --warning: #f59e0b;
            --transition: all 0.3s ease;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        
        body {
            background-color: var(--light);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        
        .header {
            background: var(--primary);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        
        .btn-home {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            padding: 10px 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-home:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .tabs {
            display: flex;
            background: var(--light);
            border-bottom: 2px solid #e5e7eb;
        }
        
        .tab {
            flex: 1;
            padding: 15px;
            text-align: center;
            text-decoration: none;
            background: var(--light);
            color: #6b7280;
            font-size: 16px;
            transition: var(--transition);
            border: none;
        }
        
        .tab.active {
            background: white;
            border-bottom: 3px solid var(--secondary);
            color: var(--primary);
            font-weight: bold;
        }
        
        .tab:hover {
            background: #e5e7eb;
            text-decoration: none;
            color: var(--primary);
        }
        
        .content {
            padding: 30px;
            min-height: 600px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: var(--primary);
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: var(--transition);
            background: white;
            color: var(--dark);
        }
        
        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 77, 143, 0.1);
        }
        
        .btn {
            background: var(--primary);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: var(--transition);
            text-decoration: none;
            display: inline-block;
        }
        
        .btn:hover {
            background: #163a6b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 77, 143, 0.3);
            text-decoration: none;
            color: white;
        }
        
        .btn-danger {
            background: var(--error);
            padding: 8px 16px;
            font-size: 14px;
        }
        
        .btn-danger:hover {
            background: #dc2626;
            box-shadow: 0 3px 10px rgba(255, 68, 68, 0.3);
        }
        
        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        table th {
            background: var(--primary);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }
        
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 14px;
        }
        
        table tr:hover {
            background: var(--light);
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .status-activo {
            background: rgba(34, 197, 94, 0.1);
            color: #15803d;
        }
        
        .status-inactivo {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }
        
        .search-form {
            margin-bottom: 20px;
        }
        
        .search-form input {
            width: 100%;
            max-width: 400px;
            padding: 12px 20px;
            border: 2px solid #d1d5db;
            border-radius: 25px;
            font-size: 14px;
            transition: var(--transition);
        }
        
        .search-form input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(26, 77, 143, 0.1);
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-weight: 500;
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            color: #15803d;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }
        
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #6b7280;
        }
        
        .empty-state h3 {
            margin-bottom: 10px;
            color: var(--primary);
        }
        
        @media (max-width: 768px) {
            .btn-home {
                position: static;
                margin-bottom: 20px;
                display: inline-flex;
            }
            
            .header {
                padding: 20px;
            }
            
            .header h1 {
                font-size: 2em;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="Inicio.php" class="btn-home">
                🏠 Volver al Inicio
            </a>
            <h1>🚗 Sistema de Gestión de Autos</h1>
            <p>Sistema Aduanas - Registro de Vehículos</p>
        </div>
        
        <div class="tabs">
            <a href="?tab=registro" class="tab <?php echo $tab_actual == 'registro' ? 'active' : ''; ?>">📝 Registrar Auto</a>
            <a href="?tab=lista" class="tab <?php echo $tab_actual == 'lista' ? 'active' : ''; ?>">📋 Lista de Autos</a>
            <a href="?tab=buscar" class="tab <?php echo $tab_actual == 'buscar' ? 'active' : ''; ?>">🔍 Buscar</a>
        </div>
        
        <div class="content">
            <?php if ($mensaje): ?>
                <?php echo $mensaje; ?>
            <?php endif; ?>
            
            <?php if ($tab_actual == 'registro'): ?>
                <!-- Tab Registro -->
                <h2>Registrar Nuevo Auto</h2>
                <form method="POST" action="?tab=registro">
                    <input type="hidden" name="action" value="crear">
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="marca">Marca *</label>
                            <input type="text" id="marca" name="marca" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="modelo">Modelo *</label>
                            <input type="text" id="modelo" name="modelo" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="año">Año *</label>
                            <input type="number" id="año" name="año" min="1900" max="2030" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="color">Color *</label>
                            <input type="text" id="color" name="color" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="patente">Patente *</label>
                            <input type="text" id="patente" name="patente" required style="text-transform: uppercase;">
                        </div>
                        
                        <div class="form-group">
                            <label for="numero_chasis">Número de Chasis *</label>
                            <input type="text" id="numero_chasis" name="numero_chasis" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="numero_motor">Número de Motor *</label>
                            <input type="text" id="numero_motor" name="numero_motor" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="cilindrada">Cilindrada (cc) *</label>
                            <input type="number" id="cilindrada" name="cilindrada" min="1" max="10000" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="combustible">Tipo de Combustible *</label>
                            <select id="combustible" name="combustible" required>
                                <option value="">Seleccionar combustible</option>
                                <option value="Gasolina">Gasolina</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Híbrido">Híbrido</option>
                                <option value="Eléctrico">Eléctrico</option>
                                <option value="GLP">GLP</option>
                                <option value="GNC">GNC</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="propietario">Nombre del Propietario *</label>
                            <input type="text" id="propietario" name="propietario" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="rut_propietario">RUT del Propietario *</label>
                            <input type="text" id="rut_propietario" name="rut_propietario" placeholder="12.345.678-9" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn">Registrar Auto</button>
                </form>
                
            <?php elseif ($tab_actual == 'lista'): ?>
                <!-- Tab Lista -->
                <h2>Lista de Autos Registrados</h2>
                
                <?php if (empty($autos)): ?>
                    <div class="empty-state">
                        <h3>No hay autos registrados</h3>
                        <p>Comienza <a href="?tab=registro">registrando tu primer auto</a></p>
                    </div>
                <?php else: ?>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Color</th>
                                    <th>Patente</th>
                                    <th>Chasis</th>
                                    <th>Motor</th>
                                    <th>Cilindrada</th>
                                    <th>Combustible</th>
                                    <th>Propietario</th>
                                    <th>RUT</th>
                                    <th>Fecha Registro</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($autos as $auto): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($auto['id']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['marca']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['modelo']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['año']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['color']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['patente']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['numero_chasis']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['numero_motor']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['cilindrada']); ?> cc</td>
                                    <td><?php echo htmlspecialchars($auto['combustible']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['propietario']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['rut_propietario']); ?></td>
                                    <td><?php echo date('d/m/Y', strtotime($auto['fecha_registro'])); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo strtolower($auto['estado']); ?>">
                                            <?php echo htmlspecialchars($auto['estado']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="action" value="eliminar">
                                            <input type="hidden" name="id" value="<?php echo $auto['id']; ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este auto?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
                
            <?php elseif ($tab_actual == 'buscar'): ?>
                <!-- Tab Buscar -->
                <h2>Buscar Autos</h2>
                
                <form method="GET" class="search-form">
                    <input type="hidden" name="tab" value="buscar">
                    <input type="text" name="buscar" placeholder="Buscar por marca, modelo, patente, propietario..." value="<?php echo htmlspecialchars($busqueda); ?>">
                    <button type="submit" class="btn">Buscar</button>
                </form>
                
                <?php if ($busqueda): ?>
                    <h3>Resultados para: "<?php echo htmlspecialchars($busqueda); ?>"</h3>
                <?php endif; ?>
                
                <?php if (empty($autos)): ?>
                    <div class="empty-state">
                        <?php if ($busqueda): ?>
                            <h3>No se encontraron resultados</h3>
                            <p>Intenta con otros términos de búsqueda</p>
                        <?php else: ?>
                            <h3>No hay autos registrados</h3>
                            <p>Comienza <a href="?tab=registro">registrando tu primer auto</a></p>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Patente</th>
                                    <th>Propietario</th>
                                    <th>RUT</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($autos as $auto): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($auto['id']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['marca']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['modelo']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['año']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['patente']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['propietario']); ?></td>
                                    <td><?php echo htmlspecialchars($auto['rut_propietario']); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo strtolower($auto['estado']); ?>">
                                            <?php echo htmlspecialchars($auto['estado']); ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Formatear RUT mientras se escribe
        document.getElementById('rut_propietario').addEventListener('input', function(e) {
            let rut = e.target.value.replace(/[^\dkK]/g, '');
            if (rut.length > 1) {
                rut = rut.slice(0, -1) + '-' + rut.slice(-1);
            }
            if (rut.length > 5) {
                rut = rut.slice(0, -5) + '.' + rut.slice(-5);
            }
            if (rut.length > 9) {
                rut = rut.slice(0, -9) + '.' + rut.slice(-9);
            }
            e.target.value = rut.toUpperCase();
        });

        // Formatear patente en mayúsculas
        document.getElementById('patente').addEventListener('input', function(e) {
            e.target.value = e.target.value.toUpperCase();
        });
    </script>
</body>
</html>