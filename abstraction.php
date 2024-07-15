<?php  
abstract class Animal  
{  
public $name;  
public $age;  
public function Describe()  
{  
return $this->name . ", " . $this->age . " years old";      
        }  
abstract public function Greet();  
}  
class cat extends Animal  
{  
public function Greet()  
{  
return "Lion!";      
}  
public function Describe()  
{  
return parent::Describe() . ", and I'm a cat!";      
}  
}  
$animal = new cat();  
$animal->name = "Seru";  
$animal->age = 5;  
echo $animal->Describe();  
echo $animal->Greet();  
  
?> 