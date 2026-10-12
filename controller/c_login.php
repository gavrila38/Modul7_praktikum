
<?php
session_start();

require_once __DIR__ . "/../model/m_login.php";

class c_login {
    public function invoke() {
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"] ?? "");
            $password = $_POST["password"] ?? "";

            $model = new m_login();
            $pengurus = $model->login($username, $password);

            if ($pengurus !== false) {
                session_regenerate_id(true);

                $_SESSION["nama"] = $pengurus->getNama();
                $_SESSION["nim"] = $pengurus->getNim();
                $_SESSION["jabatan"] = $pengurus->getJabatan();

                header("Location: index.php");
                exit;
            }

            $error = "Username atau password salah.";
        }

        require __DIR__ . "/../view/v_login.php";
    }
}
?>
