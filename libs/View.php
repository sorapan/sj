<?php

class View {

    function __construct(){


    }

    public function render($name,$noinclude = false){

        if($noinclude){

            require "app/views/" . $name . ".php";

        }else{

            require "public/layout/layout1.php";
            //require "public/layout/header.php";
            //require "app/views/" . $name . ".php";
            //require "public/layout/footer.php";

        }

    }

} 