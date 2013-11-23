<?php

class index extends Controller{

    function __construct() {

        parent::__construct();



    }

    function index(){

        //echo "inside index index";
        $this->view->css = array("index/css/main.css");
        $this->view->js = array("index/js/Content.js","index/js/Loadmore.js","index/js/PageController.js");
        $this->view->render("index/index");

    }

    function fetchMessage(){

        ini_set('max_execution_time', 31);
        $timeout = 260; //300

        $LastTime = $_POST['timestamp'];
        $NewLastTime =  self::CallModel()->TimeStamp();

        while($timeout > 0){

            if($NewLastTime <= $LastTime){

                $timeout--;
                $NewLastTime = self::CallModel()->TimeStamp();

                clearstatcache();
                flush();
                usleep(100000);

            }else{
                break;
            }
        }

        if($timeout > 0){

            if($_POST['firsttimeFetch'] == 1)echo self::CallModel()->fetchMessage();
            else echo self::CallModel()->fetchMessage_Last();

        }

    }

    function Loadmore(){

        $offsetit = $_POST['offset'];
        echo self::CallModel()->Loadmore($offsetit);

    }

    private static function CallModel(){

        return new index_model();

    }


}