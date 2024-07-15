<!-- get_class: By using this, we can get the class name of an object. -->

<?php  
    // class cls1  
    // {  
          
    // }  
    // $obj=new cls1();  
    // echo get_class($obj);  


    // class cls2  
    // {  
    //     var $x=100;  
    //     var $y=200;  
    // }  
    // print_r(get_class_vars("cls2")); 



    // class cl3
    // {


    // }
    // class_exists("cl3");



    class cls4  
    {  
          
    }  
    class cls5 extends cls4  
    {  
    }  
    echo is_subclass_of("cls5","cls4");  

?>  