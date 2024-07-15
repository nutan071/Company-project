
<?php 
class base  
    {  
        final public function dis1()  
        {  
            echo "Base class..";  
        }     
    }  
    class derived extends base  
    {  
        public function dis2()  
        {  
            echo "derived class";  
        }  
    }  
    $obj = new derived();  
    $obj->dis1();  
    $obj->dis2();  
