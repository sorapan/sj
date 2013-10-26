<?php

class Layout {

    public function __construct($page){

        $page = $_GET['page'];

        if(!empty($page)){

            if(file_exists("../".$page.".php")){

                return @include "../".$page.".php";

            }else{

                echo "Something is Wrong";

            }

        }else{

            echo "Something is Wrong";

        }

    }

}