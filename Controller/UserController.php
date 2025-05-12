<?php
require_once(__DIR__ . '/../Modal/UserModal.php');

class UserController{

    /**********************************************/
    //PARA EL REGISTRO DE LOS USUARIOS NUEVOS
    /**********************************************/
    public function RegisterUserController() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verificación del token CSRF
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $_SESSION['mensaje'] = "Error: Solicitud no válida.";
                header("Location: Rgs");
                exit;
            }
    
            // Validación y sanitización de datos
            $Cedula = filter_var($_POST['CC'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
            $Nombre = trim(filter_var($_POST['NOMBRES'], FILTER_SANITIZE_STRING));
            $Apellidos = trim(filter_var($_POST['APELLIDOS'], FILTER_SANITIZE_STRING));
            $Correo = trim(filter_var($_POST['EMAIL'], FILTER_SANITIZE_STRING));
            $Contrasena = trim(filter_var($_POST['CONTRASENA'], FILTER_SANITIZE_STRING));
    
            // Validación y almacenamiento en la base de datos
            $usuario = new UsuarioModel();

            if ($Cedula && $Nombre && $Apellidos && $Correo && $Contrasena) {
                $registro_exitoso = $usuario->RegisterUserModel($Cedula, $Nombre, $Apellidos, $Correo, $Contrasena, $Fotos);
                if ($registro_exitoso === true) {
                    $_SESSION['mensaje'] = "¡Registro Exitoso!";
                    
                    header("Location: Inicio_Sesion"); // Redirigir de nuevo a la página de registro
                    exit;
                } elseif (is_string($registro_exitoso)) {
                    // Si el modelo retorna un mensaje de error (ej. correo ya existe)
                    $_SESSION['mensaje'] = $registro_exitoso; // Guardar el mensaje de error en la sesión
                    header("Location: Inicio_Sesion"); // Redirigir de nuevo a la página de registro
                    exit;
                }
            else {
                $_SESSION['mensaje'] = "Advertencia: Los datos no son válidos.";
            }
    
            // Redirigir según el resultado
            header("Location: Inicio_Sesion"); // Redirigir a la página que corresponda
            exit;
            }
        }
    }
    /**********************************************/
    //PARA VALIDAR QUE LAS CREDENCIALES DEL USUARIO SON CORRECTAS Y LOGUEARLO
    /**********************************************/
    public function IniciarSesionController() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: Iniciar_Sesion');
            exit;
        }

        // Validar CSRF (si no lo haces en un archivo intermedio)
        if (!isset($_POST['csrf_token'], $_SESSION['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            $_SESSION['mensaje'] = 'Error de seguridad: token inválido.';
            header('Location: Iniciar_Sesion');
            exit;
        }

        // Sanitización de inputs
        $email = filter_input(INPUT_POST, 'EMAIL', FILTER_VALIDATE_EMAIL);
        $contrasena = filter_input(INPUT_POST, 'CONTRASENA', FILTER_SANITIZE_STRING);

        if (!$email || !$contrasena) {
            $_SESSION['mensaje'] = 'Por favor, ingresa un correo y contraseña válidos.';
            header('Location: Iniciar_Sesion');
            exit;
        }

        // Validación contra base de datos
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->IniciarSesionModel($email, $contrasena);

        if ($usuario) {
            // Proteger la sesión
            session_regenerate_id(true);

            $_SESSION['usuario_id'] = $usuario['Id_Usuario'];
            $_SESSION['nombre_usu'] = $usuario['Nombre'];
            // $_SESSION['rol'] = $usuario['Rol']; // Descomenta si lo usas

            header('Location: Tablero'); // Redirige al dashboard
            exit;
        } else {
            $_SESSION['mensaje'] = 'Credenciales incorrectas. Intenta de nuevo.';
            header('Location: Iniciar_Sesion');
            exit;
        }
    }

    public function GetUserBySessionController(){
        
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
            }   

        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION['usuario_id'])) {
            $usuarioID = $_SESSION['usuario_id'];

            // Obtener los datos del usuario desde el modelo
            $usuarioModel = new UsuarioModel();
            $usuario = $usuarioModel->GetUserByIdModel($usuarioID);

            // Cargar la vista para mostrar el perfil
            return $usuario;
        } else {
            // Redirigir al inicio de sesión si el usuario no ha iniciado sesión
            header('Location: Inicio_Sesion');
            exit();
        }
    }

    public function GetPlansByCompanyController() {
        // Inicia la sesión si aún no se ha iniciado
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION['usuario_id'])) {
            $usuarioID = $_SESSION['usuario_id'];
            
            // Obtener los planes correspondientes a la empresa del usuario desde el modelo
            $usuarioModel = new UsuarioModel();
            $planes = $usuarioModel->GetPlansByCompany($usuarioID);
            
            // Retornar los planes para usarlos en la vista o para procesamiento adicional
            return $planes;
        } else {
            // Si no hay sesión, redirigir al inicio de sesión
            header('Location: Inicio_Sesion');
            exit();
        }
    }

    public function GetReportsByPlansController($planId, $empresaId) {
        // Inicia la sesión si aún no se ha iniciado
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Verificar si el usuario ha iniciado sesión
        if (isset($_SESSION['usuario_id'])) {            
            // Obtener los planes correspondientes a la empresa del usuario desde el modelo
            $usuarioModel = new UsuarioModel();
            $planes = $usuarioModel->GetPlanByUrl($planId, $empresaId);
            
            // Retornar los planes para usarlos en la vista o para procesamiento adicional
            return $planes;
        } else {
            // Si no hay sesión, redirigir al inicio de sesión
            header('Location: Inicio_Sesion');
            exit();
        }
    }
    
}

class AuthController {
    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // Asegura que la sesión está iniciada
        }

        // Elimina todas las variables de sesión y destruye la sesión
        $_SESSION = [];
        session_unset();
        session_destroy();

        // Redirige al usuario a la página de inicio
        header("Location: Inicio_Sesion");
        exit();
    }
}

?>
