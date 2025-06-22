<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }
        .logo-top-left {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }

        .logo-top-left img {
            max-width: 80px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(30, 60, 114, 0.2);
            width: 100%;
            max-width: 450px;
            border: 2px solid #2a5298;
        }

        /* Logo centrado (opción actual) */
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 200px;
            height: auto;
            margin-bottom: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #1e3c72;
            font-size: 28px;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #1e3c72;
            font-weight: bold;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"],
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e3f2fd;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #fafafa;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #2a5298;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(42, 82, 152, 0.1);
        }

        /* Estilos para validación de contraseña */
        input[type="password"].invalid {
            border-color: #c62828;
            background-color: #ffebee;
        }

        input[type="password"].valid {
            border-color: #2e7d32;
            background-color: #e8f5e8;
        }

        /* Contenedor para contraseña con botón de mostrar */
        .password-container {
            position: relative;
        }

        .show-password-btn {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #2a5298;
            cursor: pointer;
            font-size: 14px;
            padding: 5px;
            width: auto;
            margin: 0;
            font-weight: normal;
        }

        .show-password-btn:hover {
            color: #1e3c72;
            background: none;
            transform: translateY(-50%);
            box-shadow: none;
        }

        /* Ajuste para el input cuando hay botón */
        .password-container input {
            padding-right: 50px;
        }

        .password-message {
            font-size: 12px;
            margin-top: 5px;
            padding: 5px;
            border-radius: 4px;
            display: none;
        }

        .password-message.error {
            color: #c62828;
            background-color: #ffebee;
            border-left: 3px solid #c62828;
            display: block;
        }

        .password-message.success {
            color: #2e7d32;
            background-color: #e8f5e8;
            border-left: 3px solid #2e7d32;
            display: block;
        }

        .password-requirements {
            font-size: 11px;
            color: #666;
            margin-top: 5px;
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            background: linear-gradient(135deg, #0d2142 0%, #1a4078 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(30, 60, 114, 0.4);
        }

        button:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #1e3c72;
        }

        .login-link a {
            color: #2a5298;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
            color: #1e3c72;
        }

        .error {
            background-color: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #c62828;
        }

        .success {
            background-color: #e8f5e8;
            color: #2e7d32;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid #2e7d32;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            h2 {
                font-size: 24px;
            }

            /* Logo más pequeño en móvil */
            .logo-top-left img {
                max-width: 60px;
            }
        }
    </style>
</head>
<body>
    <!-- Logo en esquina superior izquierda -->
    <div class="logo-top-left">
        <img src="https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=100068943858647" 
             alt="Logo" 
             onerror="this.style.display='none'">
    </div>

    <div class="container">
        <div class="logo-container">
            <!-- Logo oficial del Servicio Nacional de Aduanas -->
            <img src="https://lookaside.fbsbx.com/lookaside/crawler/media/?media_id=100068943858647" 
                 alt="Servicio Nacional de Aduanas - Chile" 
                 class="logo"
                 onerror="this.style.display='none'">
        </div>

        <h2>Registro de Usuario</h2>

        <form action="Registro_Usuario.php" method="POST" id="registroForm">
            <div class="form-group">
                <label for="Rut">RUT:</label>
                <input type="text" id="Rut" name="Rut" placeholder="12.345.678-9" required>
            </div>

            <div class="form-group">
                <label for="Nombres">Nombres:</label>
                <input type="text" id="Nombres" name="Nombres" required>
            </div>

            <div class="form-group">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" id="Apellidos" name="Apellidos" required>
            </div>

            <div class="form-group">
                <label for="Correo">Correo Electrónico:</label>
                <input type="email" id="Correo" name="Correo" placeholder="ejemplo@correo.com" required>
            </div>

            <div class="form-group">
                <label for="Clave">Contraseña:</label>
                <div class="password-container">
                    <input type="password" id="Clave" name="Clave" minlength="8" required>
                    <button type="button" class="show-password-btn" id="showPasswordBtn">
                        👁️ Mostrar
                    </button>
                </div>
                <div class="password-requirements">
                    La contraseña debe tener al menos 8 caracteres
                </div>
                <div class="password-message" id="passwordMessage"></div>
            </div>

            <div class="form-group">
                <label for="ConfirmarClave">Confirmar Contraseña:</label>
                <div class="password-container">
                    <input type="password" id="ConfirmarClave" name="ConfirmarClave" minlength="8" required>
                    <button type="button" class="show-password-btn" id="showConfirmPasswordBtn">
                        👁️ Mostrar
                    </button>
                </div>
                <div class="password-message" id="confirmPasswordMessage"></div>
            </div>

            <div class="form-group">
                <label for="Telefono">Número de Teléfono:</label>
                <input type="tel" id="Telefono" name="Telefono" placeholder="+56 9 1234 5678" required>
            </div>

            <button type="submit" name="registrar" id="submitBtn">Registrarse</button>
        </form>

        <p class="login-link">¿Ya tienes cuenta? <a href="Index.php">Inicia Sesión</a></p>
    </div>

    <script>
        const passwordInput = document.getElementById('Clave');
        const confirmPasswordInput = document.getElementById('ConfirmarClave');
        const passwordMessage = document.getElementById('passwordMessage');
        const confirmPasswordMessage = document.getElementById('confirmPasswordMessage');
        const submitBtn = document.getElementById('submitBtn');
        const registroForm = document.getElementById('registroForm');
        const showPasswordBtn = document.getElementById('showPasswordBtn');
        const showConfirmPasswordBtn = document.getElementById('showConfirmPasswordBtn');

        // Configuración de validación
        const MIN_PASSWORD_LENGTH = 8;

        // Función para mostrar/ocultar contraseña
        function togglePasswordVisibility(inputElement, buttonElement) {
            if (inputElement.type === 'password') {
                inputElement.type = 'text';
                buttonElement.innerHTML = '🙈 Ocultar';
            } else {
                inputElement.type = 'password';
                buttonElement.innerHTML = '👁️ Mostrar';
            }
        }

        // Event listeners para mostrar contraseñas
        showPasswordBtn.addEventListener('click', function() {
            togglePasswordVisibility(passwordInput, showPasswordBtn);
        });

        showConfirmPasswordBtn.addEventListener('click', function() {
            togglePasswordVisibility(confirmPasswordInput, showConfirmPasswordBtn);
        });

        // Función para validar contraseña principal
        function validatePassword() {
            const password = passwordInput.value;
            const messageElement = passwordMessage;
            
            if (password.length === 0) {
                passwordInput.classList.remove('valid', 'invalid');
                messageElement.style.display = 'none';
                return false;
            } else if (password.length < MIN_PASSWORD_LENGTH) {
                passwordInput.classList.remove('valid');
                passwordInput.classList.add('invalid');
                messageElement.textContent = `La contraseña debe tener al menos ${MIN_PASSWORD_LENGTH} caracteres. Faltan ${MIN_PASSWORD_LENGTH - password.length} caracteres.`;
                messageElement.className = 'password-message error';
                return false;
            } else {
                passwordInput.classList.remove('invalid');
                passwordInput.classList.add('valid');
                messageElement.textContent = '¡Contraseña válida!';
                messageElement.className = 'password-message success';
                return true;
            }
        }

        // Función para validar confirmación de contraseña
        function validateConfirmPassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const messageElement = confirmPasswordMessage;
            
            if (confirmPassword.length === 0) {
                confirmPasswordInput.classList.remove('valid', 'invalid');
                messageElement.style.display = 'none';
                return false;
            } else if (confirmPassword.length < MIN_PASSWORD_LENGTH) {
                confirmPasswordInput.classList.remove('valid');
                confirmPasswordInput.classList.add('invalid');
                messageElement.textContent = `La contraseña debe tener al menos ${MIN_PASSWORD_LENGTH} caracteres.`;
                messageElement.className = 'password-message error';
                return false;
            } else if (password !== confirmPassword) {
                confirmPasswordInput.classList.remove('valid');
                confirmPasswordInput.classList.add('invalid');
                messageElement.textContent = '❌ Las contraseñas no coinciden. Inténtalo nuevamente.';
                messageElement.className = 'password-message error';
                return false;
            } else {
                confirmPasswordInput.classList.remove('invalid');
                confirmPasswordInput.classList.add('valid');
                messageElement.textContent = '✅ Las contraseñas coinciden perfectamente.';
                messageElement.className = 'password-message success';
                return true;
            }
        }

        // Función para validar ambas contraseñas
        function validateBothPasswords() {
            const isPasswordValid = validatePassword();
            const isConfirmPasswordValid = validateConfirmPassword();
            return isPasswordValid && isConfirmPasswordValid;
        }

        // Event listeners para validación en tiempo real
        passwordInput.addEventListener('input', function() {
            validatePassword();
            // También validar confirmación si ya tiene contenido
            if (confirmPasswordInput.value.length > 0) {
                validateConfirmPassword();
            }
        });

        confirmPasswordInput.addEventListener('input', validateConfirmPassword);

        // Validar cuando los campos pierden el foco
        passwordInput.addEventListener('blur', validatePassword);
        confirmPasswordInput.addEventListener('blur', validateConfirmPassword);

        // Validar antes de enviar el formulario
        registroForm.addEventListener('submit', function(e) {
            const arePasswordsValid = validateBothPasswords();
            
            if (!arePasswordsValid) {
                e.preventDefault();
                
                // Determinar qué mensaje mostrar
                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                
                if (password.length < MIN_PASSWORD_LENGTH) {
                    alert(`La contraseña debe tener al menos ${MIN_PASSWORD_LENGTH} caracteres.`);
                    passwordInput.focus();
                } else if (confirmPassword.length < MIN_PASSWORD_LENGTH) {
                    alert(`La confirmación de contraseña debe tener al menos ${MIN_PASSWORD_LENGTH} caracteres.`);
                    confirmPasswordInput.focus();
                } else if (password !== confirmPassword) {
                    alert('Las contraseñas no coinciden. Por favor, verifícalas e inténtalo nuevamente.');
                    confirmPasswordInput.focus();
                    confirmPasswordInput.select(); // Seleccionar el texto para facilitar la corrección
                }
                return false;
            }
        });

        // Validación adicional con HTML5
        passwordInput.addEventListener('invalid', function(e) {
            if (passwordInput.validity.tooShort) {
                passwordInput.setCustomValidity(`La contraseña debe tener al menos ${MIN_PASSWORD_LENGTH} caracteres`);
            } else {
                passwordInput.setCustomValidity('');
            }
        });

        confirmPasswordInput.addEventListener('invalid', function(e) {
            if (confirmPasswordInput.validity.tooShort) {
                confirmPasswordInput.setCustomValidity(`La contraseña debe tener al menos ${MIN_PASSWORD_LENGTH} caracteres`);
            } else {
                confirmPasswordInput.setCustomValidity('');
            }
        });

        passwordInput.addEventListener('input', function() {
            passwordInput.setCustomValidity('');
        });

        confirmPasswordInput.addEventListener('input', function() {
            confirmPasswordInput.setCustomValidity('');
        });
    </script>
</body>
</html>