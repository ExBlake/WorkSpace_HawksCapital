<?php
require_once(__DIR__ . '/../DataBase/DB.php');

class UsuarioModel{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**********************************************/
    //PARA EL REGISTRO DE LOS USARIOS NUEVOS EN LA BASE DE DATOS
    /**********************************************/

    // Métodos auxiliares para verificar existencia
    private function checkIfEmailExists($Correo, $conn) {
        $checkEmailSql = "SELECT COUNT(*) FROM Usuarios WHERE Email = ?";
        $checkEmailStmt = $conn->prepare($checkEmailSql);
        $checkEmailStmt->bind_param("s", $Correo);
        $checkEmailStmt->execute();
        $checkEmailStmt->bind_result($count);
        $checkEmailStmt->fetch();
        $checkEmailStmt->close();
        return $count > 0;
    }

    private function checkIfCedulaExists($Cedula, $conn) {
        $checkCedulaSql = "SELECT COUNT(*) FROM Usuarios WHERE Identificacion = ?";
        $checkCedulaStmt = $conn->prepare($checkCedulaSql);
        $checkCedulaStmt->bind_param("i", $Cedula);
        $checkCedulaStmt->execute();
        $checkCedulaStmt->bind_result($count);
        $checkCedulaStmt->fetch();
        $checkCedulaStmt->close();
        return $count > 0;
    }

    public function RegisterUserModel($Cedula, $Nombre, $Apellidos, $Correo, $Contrasena, $Fotos) {
        $conn = $this->db->getConnection();
        if (!$conn) {
            throw new Exception("Error de conexión: " . mysqli_connect_error());
        }

        try {
            // Verifica si el correo o la cédula ya existen
            $checkUserSql = "SELECT COUNT(*) FROM Usuarios WHERE Email = ? OR Identificacion = ?";
            $checkUserStmt = $conn->prepare($checkUserSql);
            if (!$checkUserStmt) throw new Exception("Error en la preparación de la consulta: " . $conn->error);
            
            $checkUserStmt->bind_param("si", $Correo, $Cedula);
            $checkUserStmt->execute();
            $checkUserStmt->bind_result($count);
            $checkUserStmt->fetch();
            $checkUserStmt->close();

            if ($count > 0) {
                // Determina cuál es el error
                $emailExists = $this->checkIfEmailExists($Correo, $conn);
                $cedulaExists = $this->checkIfCedulaExists($Cedula, $conn);

                if ($cedulaExists) {
                    return "Error: Una persona ya existe con esa cédula. Por favor, utiliza otra cédula.";
                } elseif ($emailExists) {
                    return "Error: El correo electrónico ya está registrado. Por favor, utiliza otro correo.";
                }
            } else {
                // Validación de las fotos
                if (isset($_FILES['foto']) && is_array($_FILES['foto']['name'])) { // Asegúrate de que sea un array
                    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                    $allFilesValid = true;

                    foreach ($_FILES['foto']['name'] as $key => $nombreFoto) {
                        if ($_FILES['foto']['error'][$key] == 0) {
                            $fileType = mime_content_type($_FILES['foto']['tmp_name'][$key]);
                            if (!in_array($fileType, $allowedTypes)) {
                                $allFilesValid = false;
                                break;
                            }
                        }
                    }

                    if ($allFilesValid) {
                        // Procesar las imágenes si son válidas
                        $Fotos = [];
                        foreach ($_FILES['foto']['name'] as $key => $nombreFoto) {
                            if ($_FILES['foto']['error'][$key] == 0) {
                                $uploadDir = __DIR__ . '/../PicturesUsers/';
                                $extension = pathinfo($nombreFoto, PATHINFO_EXTENSION);
                                $newFileName = uniqid('foto_') . '.' . $extension;
                                $targetPath = $uploadDir . $newFileName;

                                if (move_uploaded_file($_FILES['foto']['tmp_name'][$key], $targetPath)) {
                                    $Fotos[] = $newFileName; // Agregar nombre de archivo al array
                                }
                            }
                        }
                        $token = bin2hex(random_bytes(16));

                        // Encriptar la contraseña usando bcrypt
                        $hashedPassword = password_hash($Contrasena, PASSWORD_BCRYPT);

                        // Prepara la consulta de inserción
                        $sql = "INSERT INTO usuarios (Id_Usuario, Identificacion, Nombre, Apellidos, Email, Contrasena, Foto) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        if (!$stmt) return("Error en la preparación de la consulta de inserción: " . $conn->error);

                        // Convierte $Fotos a cadena si es un array
                        $Fotos = is_array($Fotos) ? implode(",", $Fotos) : "";

                        $stmt->bind_param("sisssss",  $token, $Cedula, $Nombre, $Apellidos, $Correo, $hashedPassword, $Fotos);
                        $result = $stmt->execute();

                        if (!$result) {
                            return("Error en la ejecución");
                        }

                        $stmt->close();
                        return true; // Registro exitoso
                    } else {
                        return "Error: Solo se permiten archivos JPG, JPEG y PNG para las fotos.";
                        header("Location: Rgs"); // Redirigir a la página adecuada
                        exit;
                    }
                } else {
                    return "Error: Debes subir al menos una foto válida.";
                    header("Location: Rgs"); // Redirigir a la página adecuada
                    exit;
                }
            }
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
            header("Location: Rgs"); // Redirigir a la página adecuada
            exit;
        } finally {
            $conn->close(); // Cerrar la conexión
        }
    }
    /**********************************************/
    //PARA VALIDAR QUE LAS CREDENCIALES DEL USUARIO SON CORRECTAS Y LOGUEARLO
    /**********************************************/
    public function IniciarSesionModel($Correo, $Contrasena) {
        $conn = $this->db->getConnection();
        
        // Preparamos la consulta para obtener el usuario por correo
        $sql = "SELECT * FROM Usuarios WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $Correo);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        
        // Si el usuario existe
        if ($user) {
            // Compara la contraseña en texto plano con el hash almacenado
            if (password_verify($Contrasena, $user['Contrasena'])) {
                return $user;  // La contraseña es correcta
            } else {
                return false;  // La contraseña es incorrecta
            }
        } else {
            return false;  // No se encontró el usuario
        }
    }

    
    public function GetUserByIdModel($usuarioID) {
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM Usuarios WHERE Id_Usuario = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $usuarioID); 
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function GetPlansByCompany($usuarioID) {
        $conn = $this->db->getConnection();
        $query = "
        SELECT 
            e.Id_Empresa, 
            e.Nombre AS Empresa, 
            p.Id_Planes, 
            p.Nombre AS Plan
        FROM Empresas e
        LEFT JOIN Empresas_Planes ep ON ep.Id_Empresa = e.Id_Empresa
        LEFT JOIN Planes p ON p.Id_Planes = ep.Id_Planes
        WHERE (
            -- Si el usuario pertenece a 'hawks capital', se muestran los planes de todas las empresas
            (SELECT LOWER(e2.Nombre) 
             FROM Empresas e2 
             JOIN Usuarios u2 ON u2.Id_Empresa = e2.Id_Empresa
             WHERE u2.Id_Usuario = ?) = 'Hawks Capital S.A.S.'
            OR
            -- En caso contrario, se filtra por la empresa a la que pertenece el usuario
            e.Id_Empresa = (SELECT u3.Id_Empresa 
                            FROM Usuarios u3 
                            WHERE u3.Id_Usuario = ?)
        )
        ORDER BY e.Nombre, p.Nombre";
                  
        $stmt = $conn->prepare($query);
        // Se usa el mismo parámetro $usuarioID en ambas subconsultas
        $stmt->bind_param("ss", $usuarioID, $usuarioID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function GetPlanByUrl($planId, $empresaId) {
        $conn = $this->db->getConnection();
        $query = "
        SELECT 
        e.Id_Empresa,
        e.Nombre AS Nombre_Empresa,
        p.Id_Planes,
        p.Nombre AS Nombre_Plan,
        i.Url AS Url
        FROM Empresas e
        JOIN Informes i ON e.Id_Empresa = i.Id_Empresa
        JOIN Planes p ON i.Id_Planes = p.Id_Planes
        WHERE p.Id_Planes = ? AND e.Id_Empresa = ?;
        ";
                  
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $planId, $empresaId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    
    
}
?>