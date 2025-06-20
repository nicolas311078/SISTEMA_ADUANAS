<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/UG6swU2Im1vVX05Vk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <title>Tramites y Permisos De Menores</title>
        
        <style>
            /* ELIMINÉ LOS ESTILOS CONFLICTIVOS */
            /* Ahora solo estilos específicos para la lista que no están en style.css */
            .list-group-item {
                background-color: #fff;
                color: #1a4d8f;
                border: 1px solid #bfc9d9;
                border-radius: 8px;
                margin-bottom: 12px;
                padding: 16px;
                transition: all 0.3s ease;
            }
            
            .list-group-item:hover {
                background-color: #1a4d8f;
                color: white;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(26, 77, 143, 0.2);
            }
            
            .list-group-item a {
                color: inherit;
                text-decoration: none;
                display: block;
                font-weight: 500;
            }
            
            .list-group-item i {
                margin-right: 12px;
                width: 20px;
            }
            
            .info-card {
                background: linear-gradient(135deg, #1a4d8f, #2563eb);
                color: white;
                padding: 24px;
                border-radius: 10px;
                margin-bottom: 24px;
                text-align: center;
            }
            
            .info-card h1 {
                color: white;
                margin-bottom: 12px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="info-card">
                <h1><i class="fas fa-file-alt"></i> Trámites y Permisos para Menores</h1>
                <p>Sistema integral para la gestión de documentos y permisos de menores de edad</p>
            </div>
            
            <h2><i class="fas fa-list"></i> Servicios Disponibles</h2>
            <p>Selecciona el trámite que necesitas realizar. Cada opción te guiará através del proceso paso a paso.</p>
            
            <div class="list-group">
                <div class="list-group-item">
                    <a href="#permiso-viaje">
                        <i class="fas fa-plane"></i>
                        <strong>Permiso de Viaje para Menores</strong><br>
                        <small>Autorización para viajes nacionales e internacionales</small>
                    </a>
                </div>
                
                <div class="list-group-item">
                    <a href="#cedula-identidad">
                        <i class="fas fa-id-card"></i>
                        <strong>Cédula de Identidad</strong><br>
                        <small>Documento oficial de identificación</small>
                    </a>
                </div>
                
                <div class="list-group-item">
                    <a href="#pasaporte">
                        <i class="fas fa-passport"></i>
                        <strong>Pasaporte para Menores</strong><br>
                        <small>Documento para viajes internacionales</small>
                    </a>
                </div>
                
                <div class="list-group-item">
                    <a href="#permiso-trabajo">
                        <i class="fas fa-briefcase"></i>
                        <strong>Permiso de Trabajo</strong><br>
                        <small>Autorización laboral para adolescentes</small>
                    </a>
                </div>
                
                <div class="list-group-item">
                    <a href="#autorizacion-medica">
                        <i class="fas fa-heartbeat"></i>
                        <strong>Autorización Médica</strong><br>
                        <small>Consentimiento para tratamientos médicos</small>
                    </a>
                </div>
                
                <div class="list-group-item">
                    <a href="#certificado-estudios">
                        <i class="fas fa-graduation-cap"></i>
                        <strong>Certificados de Estudios</strong><br>
                        <small>Documentación académica oficial</small>
                    </a>
                </div>
            </div>
            
            <div style="background: #eaf1fb; padding: 20px; border-radius: 8px; margin-top: 24px;">
                <h3><i class="fas fa-info-circle"></i> Información Importante</h3>
                <ul style="margin-left: 20px;">
                    <li>Todos los trámites requieren la presencia de un tutor legal</li>
                    <li>Documentación necesaria: cédula del menor y tutor</li>
                    <li>Algunos trámites pueden requerir documentos adicionales</li>
                    <li>Horario de atención: Lunes a Viernes 8:00 AM - 4:00 PM</li>
                </ul>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>