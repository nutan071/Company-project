<?php  
// abstract class a  
// {  
// abstract public function dis1();  
// abstract public function dis2();  
// }  
// class b extends a  
// {  
// public function dis1()  
//     {  
//         echo "javatpoint";  
//     }  
//     public function dis2()  
//     {  
//         echo "SSSIT";     
//     }  
// }  
// $obj = new b();  
// $obj->dis1();  
// $obj->dis2();  







abstract class Fruit  
{  
    public $name;  
    public $age;  
public function Describe()  
        {  
                return $this->name . ", " . $this->age . " years old";      
        }  
abstract public function Greet();  
    }  
class Apple extends Fruit  
{  
public function Greet()  
        {  
                return "Woof!";      
        }  
      
        public function Describe()  
        {  
                return parent::Describe() . ", and I'm a Developer!";      
        }  
}  
$animal = new Apple();  
$animal->name = "Nutan";  
$animal->age = 19;  
echo $animal->Describe();  
echo $animal->Greet();  
?>  

