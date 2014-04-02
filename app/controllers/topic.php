<?php

class topic extends Controller{

    function __construct(){

        parent::__construct();
        $this->view->css = array("topic/css/topic_style.css");

    }

    function index(){

        header("location:".URL."topic/id");

    }

    function id($id){

        if(!empty($id)){

            $this->view->info = self::CallModel()->topic_info($id);
            $this->view->img = self::CallModel()->fetch_img($id);

        }
        $this->view->render("topic/id");

    }

    private static function CallModel(){

        return new topic_model();

    }

} 