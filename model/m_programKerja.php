
<?php
require_once __DIR__ . "/../koneksiMVC.php";

class m_programKerja {
    private $db;

    public function __construct() {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function getSemuaPogramKerja() {
        $result = $this->db->query(
            "SELECT * FROM proker ORDER BY nomorProgram"
        );

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProgramKerja($nomor) {
        $stmt = $this->db->prepare(
            "SELECT * FROM proker WHERE nomorProgram = ?"
        );
        $stmt->bind_param("s", $nomor);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function tambahProgramKerja($nomor, $nama, $surat) {
        $stmt = $this->db->prepare(
            "INSERT INTO proker
            (nomorProgram, namaProgram, suratKeterangan)
            VALUES (?, ?, ?)"
        );
        $stmt->bind_param("sss", $nomor, $nama, $surat);

        return $stmt->execute();
    }

    public function ubahProgramKerja($nomor, $nama, $surat) {
        $stmt = $this->db->prepare(
            "UPDATE proker
            SET namaProgram = ?, suratKeterangan = ?
            WHERE nomorProgram = ?"
        );
        $stmt->bind_param("sss", $nama, $surat, $nomor);

        return $stmt->execute();
    }

    public function hapusProgramKerja($nomor) {
        $stmt = $this->db->prepare(
            "DELETE FROM proker WHERE nomorProgram = ?"
        );
        $stmt->bind_param("s", $nomor);

        return $stmt->execute();
    }
}
?>
