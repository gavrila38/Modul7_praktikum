<?php
    class pengurusBEM{
        public $nama;
        public $nim;
        public $angkatan;
        public $jabatan;
        public $foto;

        public function setNama($nama){
            $this -> nama = $nama;
        }
        public function getNama(){
            echo "$this->nama";
        }
        public function setNIM($nim){
            $this -> nim = $nim;
        }
        public function getNIM(){
            echo $this -> nim;
        }
        public function setAngkatan($angkatan){
            $this -> angkatan = $angkatan;
        }
        public function getAngkatan(){
            echo $this -> angkatan;
        }
        public function setJabatan($jabatan){
            $this->jabatan = $jabatan;
        }
        public function getJabatan(){
            echo "$this->jabatan";
        }
        public function setFoto($foto){
            $this -> foto = $foto;
        }
        public function getFoto(){
            echo $this -> foto;
        }
    }

?>