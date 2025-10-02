<?php
class mahasiswa {
    private $nim;
    private $nama;
    private $prodi;

    public function __construct($nim,$nama,$prodi) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
    }
    function tampil_data(){
    echo "NIM : " .$this->nim. "<br>";
    echo "Nama : ".$this->nama."<br>";
    echo "Prodi : ".$this->prodi."<br><br>";
}
}


$mahasiswa1=new mahasiswa ("E41241944","Mohammad Almil Hisnulloh","Teknik Informatika");
$mhasiswa2=new mahasiswa ("E41241944","Mohammad Almil ","Teknik Informatika");

$mahasiswa1->tampil_data();
$mhasiswa2->tampil_data();
?>