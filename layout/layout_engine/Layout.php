<?php

class Layout {

    public static function Choose($get_page){

        $page =  isset($get_page) ? $get_page : 0;
        if($page) {

            echo "do something";

        }else{

            require "../".$page;

        }

    }

}