
<?php
class pengurusBEM {
    protected $nama;
    protected $nim;
    protected $angkatan;
    protected $jabatan;
    protected $foto;

    public function __construct($data) {
        $this->nama = $data["nama"];
        $this->nim = $data["nim"];
        $this->angkatan = $data["angkatan"];
        $this->jabatan = $data["jabatan"];
        $this->foto = $data["foto"] ?? null;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getNim() {
        return $this->nim;
    }

    public function getJabatan() {
        return $this->jabatan;
    }
}

class menteri extends pengurusBEM {
    public function bolehMengelolaProker() {
        return false;
    }
}

class kepala_departemen extends pengurusBEM {
    public function bolehMengelolaProker() {
        return true;
    }
}
?>
