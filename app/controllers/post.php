<?php

class post extends Controller{

    function __construct() {

        parent::__construct();

//        Session::init();
//        $login  = Session::get('login');
//
//        if($login != true){
//
//            Session::destroy();
//            header("location: ".URL."login");
//            exit;
//
//        }


        $this->view->css = array("post/css/post_style.css");
        $this->view->js = array("post/js/PushData.js");

    }

    function index(){

        $this->view->render("post/index");

    }

    function PushData(){

        $data = array(
            'header' => $_POST['header'],
            'content' => $_POST['content']
        );

        self::CallModel()->PushData($data);

    }

    private static function CallModel(){

        return new post_model();

    }

} 