<?php

class topic extends Controller{

    function __construct(){

        parent::__construct();

        Session::init();
        Session::checkLogin();

        $this->view->css = array("topic/css/topic_style.css");
        $this->view->js = array("topic/js/topic_control.js");

    }

    function index(){

        header("location:".URL);

    }

    function id($id){

        if(!empty($id)){

            $this->view->info = self::CallModel()->topic_info($id);
            $this->view->img = self::CallModel()->fetch_img($id);
            $this->view->carimg = self::CallModel()->fetch_carimg($id);
            $this->view->carimg2 = self::CallModel()->fetch_carimg2($id);
            $this->view->carimg3 = self::CallModel()->fetch_carimg3($id);

        }else{
            @header("location:".URL);
        }
        $this->view->render("topic/id");

    }

    function verify(){

        self::CallModel()->Verify($_POST['id']);

    }

    private static function CallModel(){

        return new topic_model();

    }

} 