<?php
class itemproduk
{
    private $merek;

    function Ukuran()
    {
        echo "size L";
    }
    function warna()
    {
        echo "warna hitam";
    }
    function set_merek($nama)
    {
        $this->merek = $nama;
    }
    function get_merek()
    {
        return $this->merek;
    }
}
class topi extends itemproduk
{
    private $model;

    function set_model($newModel)
    {
        $this->model = $newModel;
    }
    function get_model()
    {
        return $this->model;
    }
}
class celana extends itemproduk
{
    private $tipe;
    private $model;

    function set_model($newModel)
    {
        $this->model = $newModel;
    }
    function get_model()
    {
        return $this->model;
    }
    function set_tipe($newTipe)
    {
        $this->tipe = $newTipe;
    }
    function get_tipe($newTipe)
    {
        return $this->tipe;
    }
}

class baju extends itemproduk
{
    private $tipe;

    function set_tipe($newTipe)
    {
        $this->tipe = $newTipe;
    }
    function get_tipe()
    {
        return $this->tipe;
    }
}

$cetak = new baju;
$cetak->set_tipe("oversize");
$cetak->set_merek("almil");
echo $cetak->get_merek() . "<hr>";
echo $cetak->get_tipe() . "<br>";
$cetak->Ukuran();
echo "<br>";
$cetak->warna();
