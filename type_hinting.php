<?php  
      
    // class a  
    // {  
    //     public $c= "hello javatpoint";  
    // }  
    // //create function with class name argument  
    // function display(a $a1)  
    // {  
    //     //call variable  
    //     echo $a1->c;  
    // }  
    // display(new a());  



    class Test1  
    {  
        public $var= "hello javatpoint and SSSIT";  
    }  
    //create function with class name argument  
    function typehint(Test1 $t1)  
    {  
        //call variable  
        echo $t1->var;  
    }  
    //call function with call name as a argument  
    typehint(new Test1());  

?>  