<?php

class Layout {

    public function __construct($page){

        $page = $_GET['page'];

        if(isset($page)){

            self::CallPage($page);

        }else{

            echo self::ErrorMessage();

        }

    }

    private static function CallPage($page){

        if(!empty($page)){

            if(file_exists("../Main/".$page.".php")){

                return @include "../Main/".$page.".php";

            }else{

                echo self::ErrorMessage();

            }

        }else{

            return @include "../Main/main.php";

        }

    }

    private static function ErrorMessage(){

        return "Something is Wrong";

    }

}