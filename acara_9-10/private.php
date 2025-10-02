<?php
class person
{
    private $name;
    function set_name($new_name)
    {
        $this->name = $new_name;
    }
    function get_name()
    {
        return $this->name;
    }
}
?> 
<?php
$person1 = new Person();
// improvisasi via method 
$person1->set_name("almil");
// akses via method
echo $person1->get_name();
echo "<hr>";

// akses via class secara langsung  (gagal)
echo "Hai " . $person1->name = 'Lukman Hakim';
echo "<hr>";
// methob tidak bisa di akses secara langsung (gagal)
echo $person1->get_name();
?>
