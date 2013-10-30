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

            if(file_exists("../".$page.".php")){

                return @include "../".$page.".php";

            }else{

                echo self::ErrorMessage();

            }

        }else{

            return @include "../main.php";

        }

    }

    private static function ErrorMessage(){

        return "Something is Wrong";

    }

}