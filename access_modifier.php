<?php

//public

// class Demo  
// {  
//     public $name = "Ajeet";  
    
//     public function disp()  
//     {  
//         echo $this->name . "<br/>";  
//     }  
// }  

// class Child extends Demo  
// {  
//     public function show()  
//     {  
//         echo $this->name;  
//     }  
// }     

// $obj = new Child;  
// echo $obj->name . "<br/>";     
// $obj->disp();  
// $obj->show();  



//private
// class Javatpoint  
// {  
//     private $name = "Sonoo";  
    
//     private function show()  
//     {  
//         echo "This is a private method of parent class";  
//     }  
    
    
//     public function getName() {
//         return $this->name;
//     }
// }     

// class Child extends Javatpoint  
// {  
//     public function show1()  
//     {  
    
//         echo $this->getName() . "<br/>";
        
       
//     }  
// }     

// $obj = new Child;  

// $obj->show1();





//protected



// class Javatpoint  
// {  
//     protected $x=500;  
//     protected $y=100;  
//         function add()  
//     {  
//         echo $sum=$this->x+$this->y."<br/>";  
//     }  
//  }     
// class child extends Javatpoint  
// {  
// function sub()  
// {  
// echo $sub=$this->x-$this->y."<br/>";  
// }  
  
// }     
// $obj= new child;  
// $obj->add();  
// $obj->sub();  



//public private and protected



class Javatpoint  
{    
public $name="Ajeet";  
protected $profile="HR";   
private $salary=5000000;  
public function show()  
{  
echo "Welcome : ".$this->name."<br/>";  
echo "Profile : ".$this->profile."<br/>";  
echo "Salary : ".$this->salary."<br/>";  
}  
}     
class childs extends Javatpoint  
{  
public function show1()  
{  
echo "Welcome : ".$this->name."<br/>";  
echo "Profile : ".$this->profile."<br/>";  
echo "Salary : ".$this->salary."<br/>";  
}  
}     
$obj= new childs;     
$obj->show1();  


?>





