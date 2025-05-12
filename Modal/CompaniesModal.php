// CompaniesModal.php
<?php
require_once(__DIR__ . '/../DataBase/DB.php');

class CompaniesModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * @param string $NIT
     * @param string $Nombre
     * @param string $Descripcion
     * @param string $Categoria
     * @param string $Estado
     * @param string $Ubicacion
     * @param string $Web
     * @param string $logoName
     * @return bool|string
     */
    public function RegisterCompaniesModel(
        $NIT,
        $Nombre,
        $Descripcion,
        $Categoria,
        $Estado,
        $Ubicacion,
        $Web,
        $logoName
    ) {
        $conn = $this->db->getConnection();
        if (!$conn) {
            return "Error de conexión: " . mysqli_connect_error();
        }

        try {
            // 1) Verificar NIT único
            $check = $conn->prepare("SELECT COUNT(*) FROM Empresas WHERE Id_Empresa = ?");
            $check->bind_param("s", $NIT);
            $check->execute();
            $check->bind_result($count);
            $check->fetch();
            $check->close();
            if ($count > 0) {
                return "Error: Ya existe una empresa con ese NIT.";
            }

            // 2) Insertar
            $sql = "INSERT INTO Empresas
                (Id_Empresa, Nombre, Descripcion, Categoria, Estado, Ubicacion, Sitio_Web, Logo)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                return "Error en preparación: " . $conn->error;
            }
            $stmt->bind_param(
                "ssssssss",
                $NIT,
                $Nombre,
                $Descripcion,
                $Categoria,
                $Estado,
                $Ubicacion,
                $Web,
                $logoName
            );
            if (!$stmt->execute()) {
                return "Error en inserción: " . $stmt->error;
            }
            $stmt->close();
            return true;

        } catch (Exception $e) {
            return "Excepción: " . $e->getMessage();
        } finally {
            $conn->close();
        }
    }
}
