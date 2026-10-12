
<?php
require_once __DIR__ . "/../model/m_programKerja.php";

class c_programKerja {
    private $model;

    public function __construct() {
        $this->model = new m_programKerja();
    }

    public function invoke() {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (!isset($_SESSION["jabatan"])) {
            header("Location: login.php");
            exit;
        }

        $jabatan = $_SESSION["jabatan"];
        $bolehMengelola = ($jabatan === "Kepala Departemen");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!$bolehMengelola) {
                http_response_code(403);
                exit("Akses ditolak. Anda hanya dapat melihat data.");
            }

            $aksi = $_POST["aksi"] ?? "";
            $nomor = trim($_POST["nomorProgram"] ?? "");
            $nama = trim($_POST["namaProgram"] ?? "");
            $surat = trim($_POST["suratKeterangan"] ?? "");

            if ($aksi === "tambah" && $nomor !== "" &&
                $nama !== "" && $surat !== "") {
                $this->model->tambahProgramKerja($nomor, $nama, $surat);
            } elseif ($aksi === "ubah" && $nomor !== "" &&
                $nama !== "" && $surat !== "") {
                $this->model->ubahProgramKerja($nomor, $nama, $surat);
            } elseif ($aksi === "hapus" && $nomor !== "") {
                $this->model->hapusProgramKerja($nomor);
            }

            header("Location: index.php");
            exit;
        }

        $edit = null;

        if (isset($_GET["edit"]) && $bolehMengelola) {
            $edit = $this->model->getProgramKerja($_GET["edit"]);
        }

        $proker = $this->model->getSemuaPogramKerja();

        require __DIR__ . "/../view/v_administrasi.php";
    }
}
?>
