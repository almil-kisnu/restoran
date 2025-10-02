<?php
class Person
{
    protected $name;   // hanya bisa diakses dari class ini & turunannya

    function set_name($new_name)
    {
        $this->name = $new_name;
    }

    function get_name()
    {
        return $this->name;
    }
}

$person1 = new Person();

// set value via method (berhasil)
$person1->set_name("Lukman Hakim");
echo "Protected via method: " . $person1->get_name();
echo "<hr>";

// akses langsung via class (error)
echo "Protected langsung: " . $person1->name;
