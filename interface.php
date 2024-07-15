<?php  
//     interface a  
//     {  
//         public function dis1();  
//     }  
//     interface b  
//     {  
//         public function dis2();  
//     }  
  
// class demo implements a,b  
// {  
//     public function dis1()  
//     {  
//         echo "method 1...";  
//     }  
//     public function dis2()  
//     {  
//         echo "method2...";  
//     }  
// }  
// $obj= new demo();  
// $obj->dis1();  
// $obj->dis2();  
  





interface i1  
    {  
        public function fun1();  
    }  
    interface i2  
    {  
        public function fun2();  
    }  
class cls1 implements i1,i2  
{  
    function fun1()  
    {  
        echo "javatpoint";  
    }  
    function fun2()  
    {  
        echo "SSSIT";  
    }  
}  
$obj= new cls1();  
$obj->fun1();  
$obj->fun2();  












?>