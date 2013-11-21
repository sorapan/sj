<?php

class post extends Controller{

    function __construct() {

        parent::__construct();

    }

    function index(){

        $this->view->css = array("post/css/post_style.css");
        $this->view->js = array("post/js/PushData.js");
        $this->view->render("post/index");

    }

    function PushData(){

        $data = array(
            'header' => $_POST['header'],
            'content' => $_POST['content']
        );

        $this->model->PushData($data);

    }

    private static function CallModel(){

        return new post_model();

    }

} 