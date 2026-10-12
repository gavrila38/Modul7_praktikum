<?php

include "pengurusBEM.php";

class menteri extends pengurusBEM {
    public function __construct($nama){
        $this->nama = $nama;
    }

    function setJabatan( $jabatan){
        $this->jabatan = $jabatan;
    }
    public function getJabatan(){

    echo "$this->jabatan";
    }
}

?>