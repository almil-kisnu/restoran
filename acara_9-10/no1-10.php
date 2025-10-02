<?php
class mobilLengkap
{

    function kelengkapan()
    {
        echo "bmw M4 series<br>kelengkapan :<br>stnk<br>bpkb<br>";
        echo "cara menyalakan : <br> 1. ambil kunci<br> 2. nyalakan mesin<br> 3. masukkan gigi <br> 4. gas pentok";
    }
}

class mobilBmw extends mobilLengkap
{
    function cetak()
    {
        $this->kelengkapan();
        echo "<br>brum brum brum";
    }
}

class mobilBeraksi
{
    function gaspol()
    {
        $jalanin = new mobilBmw();
        $jalanin->cetak();
    }
}

$hasil = new mobilBeraksi();
$hasil->gaspol();
