<?php
class Tablet
{
    //via langsung -> hanya public
    protected $merk;
    protected $camera;
    protected $memory;

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

// via child method
$hp = new Handphone();
$hp->setTablet_via_childMethod("samsung", 12, 512);
echo $hp->info() . "<hr>";

// via langsung
$hp->merk = "xiomi";
$hp->camera = 48;
$hp->memory = 128;
echo $hp->info() . "<hr>";
