<?php  
    // class Example  
    // {  
    //     public function __construct()  
    //     {  
    //         echo "Hello javatpoint";  
    //     }  
    // }  
    // $obj = new Example();  
    // $obj = new Example();  




    class demo  
    {  
        public function demo()  
        {  
            echo "constructor1...";  
        }  
    }  
      
    class demo1 extends demo  
    {  
        public function __construct()  
        {  
            echo parent::demo();  
            echo "constructor2...";  
        }  
    }  
    $obj= new demo1();  
    // $obj->demo2();

?>  