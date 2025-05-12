// CompaniesController.php
<?php
require_once(__DIR__ . '/../Modal/CompaniesModal.php');

class CompaniesController {
    public function RegisterCompaniesController() {
        // 1) Solo POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: Empresas?error=invalid_method");
            exit;
        }

        // 2) CSRF
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            $_SESSION['Mensaje'] = "Error: Solicitud no válida.";
            header("Location: LogIn");
            exit;
        }

        // 3) Sanitizar campos
        $NIT         = trim(filter_var($_POST['NIT'], FILTER_SANITIZE_STRING));
        $Nombre      = trim(filter_var($_POST['NOMBRE'], FILTER_SANITIZE_STRING));
        $Categoria   = trim(filter_var($_POST['INDUSTRIA'], FILTER_SANITIZE_STRING));
        $Estado      = trim(filter_var($_POST['ESTADO'], FILTER_SANITIZE_STRING));
        $Descripcion = trim(filter_var($_POST['DESCRIPCION'], FILTER_SANITIZE_STRING));
        $Ubicacion   = trim(filter_var($_POST['UBICACION'], FILTER_SANITIZE_STRING));
        $Web         = trim(filter_var($_POST['WEB'], FILTER_SANITIZE_URL));

        // 4) Validar campos obligatorios
        $required = compact('NIT','Nombre','Categoria','Estado','Descripcion','Ubicacion','Web');
        $errors = [];
        foreach ($required as $field => $value) {
            if ($value === '') {
                $errors[] = "El campo {$field} es obligatorio.";
            }
        }
        // 5) Validar y mover logo

        if (!isset($_FILES['LOGO']) || $_FILES['LOGO']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['Mensaje'] = "Debes subir un logo válido.";
            header("Location: Empresas?error=logo");
            exit;
        }
        $allowed = ['image/jpeg','image/jpg','image/png'];
        $mime    = mime_content_type($_FILES['LOGO']['tmp_name']);
        if (!in_array($mime, $allowed)) {
            $_SESSION['Mensaje'] = "Solo JPG, JPEG o PNG para el logo.";
            header("Location: Empresas?error=logo_type");
            exit;
        }
        $ext      = pathinfo($_FILES['LOGO']['name'], PATHINFO_EXTENSION);
        $logoName = uniqid('logo_') . '.' . $ext;
        $destino  = __DIR__ . '/../PicturesCompanies/' . $logoName;
        if (!move_uploaded_file($_FILES['LOGO']['tmp_name'], $destino)) {
            $_SESSION['Mensaje'] = "Error al guardar el logo.";
            header("Location: Empresas?error=logo_save");
            exit;
        }


        // 6) Llamar al modelo
        $model = new CompaniesModel();
        $ok = $model->RegisterCompaniesModel(
            $NIT,
            $Nombre,
            $Descripcion,
            $Categoria,
            $Estado,
            $Ubicacion,
            $Web,
            $logoName
        );

        // 7) Respuesta
        if ($ok === true) {
            $_SESSION['Mensaje'] = "¡Registro Exitoso!";
            header("Location: Empresas?msg=success");
        } else {
            $_SESSION['Mensaje'] = is_string($ok) ? $ok : "Error desconocido al registrar.";
            header("Location: Empresas?error=model");
        }
        exit;
    }
}
