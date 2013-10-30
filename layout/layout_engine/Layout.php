<?php

class Layout {

    public function __construct($page){

        $page = $_GET['page'];
        $error_msg = "Something is Wrong";

        if(isset($page)){

            if(!empty($page)){

                if(file_exists("../".$page.".php")){

                    return @include "../".$page.".php";

                }else{

                    echo $error_msg;

                }

            }else{

                echo $error_msg;

            }

        }else{

            echo $error_msg;

        }


    }

}