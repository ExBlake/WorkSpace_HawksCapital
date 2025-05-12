<?php
session_start();
require_once(__DIR__ . '/UserController.php');
require_once(__DIR__ . '/CompaniesController.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica que ambos tokens estén definidos y sean iguales (seguridad CSRF)
    if (isset($_SESSION['csrf_token'], $_POST['csrf_token']) &&
        hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        
        // Manejo de acciones
        if (isset($_POST['accionRegistrarUsuario']) && $_POST['accionRegistrarUsuario'] === 'RegistrarUsuario') {
            $usuarioController = new UserController();
            $usuarioController->RegisterUserController();
        } 
        elseif (isset($_POST['accionIniciarSesion']) && $_POST['accionIniciarSesion'] === 'Iniciar_Sesion') {
            $loginController = new UserController();
            $loginController->IniciarSesionController();
        }

        if (isset($_POST['accionSaveCompany']) && $_POST['accionSaveCompany'] === 'Registrar_Empresa') {
            $companiesController = new CompaniesController();
            $companiesController->RegisterCompaniesController();
        } 
    } else {
        echo "Token CSRF no válido.";
    }
}
?>
