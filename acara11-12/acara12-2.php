<?php

// Interface Mesin
interface Mesin {
    public function nyalakanMesin();
}

// Abstract class Kendaraan
abstract class Kendaraan {
    protected $merk;

    public function __construct($merk) {
        $this->merk = $merk;
    }

    // Method abstract → wajib diisi oleh class turunan
    abstract public function jalan();
}

// Class Mobil (punya mesin)
class Mobil extends Kendaraan implements Mesin {
    public function nyalakanMesin() {
        return "Mesin mobil {$this->merk} dinyalakan.";
    }

    public function jalan() {
        return "Mobil {$this->merk} melaju di jalan raya.";
    }
}

// Class Motor (punya mesin)
class Motor extends Kendaraan implements Mesin {
    public function nyalakanMesin() {
        return "Mesin motor {$this->merk} dinyalakan.";
    }

    public function jalan() {
        return "Motor {$this->merk} melaju di jalan kecil.";
    }
}

// Class Sepeda (tidak punya mesin, hanya tenaga manusia)
class Sepeda extends Kendaraan {
    public function jalan() {
        return "Sepeda {$this->merk} dikayuh dengan pedal.";
    }
}

// ----------------------
// Testing program
// ----------------------
$mobil = new Mobil("Toyota");
$motor = new Motor("Honda");
$sepeda = new Sepeda("Polygon");

echo $mobil->nyalakanMesin() . "<br>";
echo $mobil->jalan() . "<br><br>";

echo $motor->nyalakanMesin() . "<br>";
echo $motor->jalan() . "<br><br>";

echo $sepeda->jalan() . "<br>";
