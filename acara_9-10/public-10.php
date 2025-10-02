<?php
class Tablet
{
    //via langsung -> hanya public
    public $merk;
    public $camera;
    public $memory;

    //via parent method -> semua bisa(public,protected,private) 
    public function setTablet_via_parentMethod($merk, $camera, $memory)
    {
        $this->merk = $merk;
        $this->camera = $camera;
        $this->memory = $memory;
    }

    public function info()
    {
        return "Tablet: $this->merk, Camera: $this->camera MP, Memory: $this->memory GB";
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

// via langsung
$hp = new Handphone();
$hp->merk = "xiomi";
$hp->camera = 48;
$hp->memory = 128;
echo $hp->info();
