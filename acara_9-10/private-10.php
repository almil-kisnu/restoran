<?php
class Tablet
{
    //via langsung -> hanya public
    public $merk;
    protected $camera;
    private $memory;

    //via parent method -> semua bisa(public,protected,private) 
    public function setTablet_via_parentMethod($merk, $camera, $memory)
    {
        $this->merk = $merk;
        $this->camera = $camera;
        $this->memory = $memory;
    }

    public function info()
    {
        return "Tablet: $this->merk<br>Camera: $this->camera MP<br>Memory: $this->memory GB";
    }

}

class Handphone extends Tablet
{

    // via child method -> hanya public n protected
    public function setTablet_via_childMethod($merk, $camera, $memory)
    {
        $this->merk = $merk;
        $this->camera = $camera;
        $this->memory = $memory;
    }
}

// instansiasi
$hp = new Handphone();

// via langsung
$hp->merk = "xiomi";
echo $hp->info() . "<hr>";
$hp->camera = 48;
echo $hp->info() . "<hr>";
$hp->memory = 128;
echo $hp->info() . "<hr>";