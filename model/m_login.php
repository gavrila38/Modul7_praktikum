```php
<?php
require_once __DIR__ . "/../koneksiMVC.php";
require_once __DIR__ . "/m_pengurusBEM.php";

class m_login {
    private $db;

    public function __construct() {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare(
            "SELECT * FROM pengurus_bem WHERE username = ?"
        );

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        if (
            !$data ||
            !password_verify($password, $data["password"])
        ) {
            return false;
        }

        if ($data["jabatan"] === "Menteri") {
            return new menteri($data);
        }

        if ($data["jabatan"] === "Kepala Departemen") {
            return new kepala_departemen($data);
        }

        return false;
    }
}
?>
```