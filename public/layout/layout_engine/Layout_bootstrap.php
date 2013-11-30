<?php

$url = isset($_GET['url']) ? $_GET['url'] : null ;
$url = rtrim($url, '/');
$url = explode('/', $url);
//print_r($url);

if(isset($url[1])){

    $dir = "app/views/".CheckUrlZero($url[0])."/".CheckUrlOne($url[0],$url[1]).".php";

    if(file_exists($dir)){

        require $dir;

    }else{

        require "app/views/error/index.php";

    }

}else{

    require "app/views/".CheckUrlZero($url[0])."/index.php";

}



function CheckUrlZero($url){

        if(empty($url)){

            return "index";

        }else{

            $file = 'app/views/'. $url . "/";

            if(file_exists($file)){

                return $url;

            }else{

                return "error";

            }

        }

    }

function CheckUrlOne($url0,$url){

        if(empty($url)){

            return "index";

        }else{

            $file = 'app/views/'. $url0 . "/" . $url . ".php";

            if(file_exists($file)){

                return $url;

            }else{

                //$this->error();

            }

        }

        return false;



}