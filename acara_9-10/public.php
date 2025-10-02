<?php
class person
{
    public $name;
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
// properti di akses secara langsung (berhasil)
echo "Hai " . $person1->name = 'hello boy';
echo "<hr>";
// method langsung memiliki nilai yang di isi di class (berhasil)
echo $person1->get_name();
?>
