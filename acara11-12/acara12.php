<?php
abstract class person{
    abstract function greet();
}

class english extends person{
    function greet(){
        return "hello, i have stayed english for 10 years";
    }
}
class german extends person{
    function greet(){
        return "hello, i have stayed german for 10 years";
    }
}
class french extends person{
    function greet(){
        return "hello, i have stayed french for 10 years";
    }
}

$a = new english;
$b = new german;
$c = new french;

echo $a->greet();