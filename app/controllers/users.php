<?php

class users extends Controller{

    function __construct(){

        parent::__construct();


        $this->view->css = array("users/css/users_style.css");

        $this->view->js = array("users/js/users_pagecontrol.js");

    }

    function index(){

        $this->view->data = self::CallModel()->index();
        $this->view->render("users/index");

    }

    function edit($id){

        $this->view->target = self::CallModel()->singleRow($id);
        $this->view->render("users/edit");

    }

    function editsave(){

        $data = array(

            "id" => $_POST['id'],
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "class" => $_POST['class']

        );

        self::CallModel()->editsave($data);
        header("location:".URL."users");


    }


    function insert(){

        $data = array(
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "class" => $_POST['class']
        );

        self::CallModel()->insert($data);
        header("location:".URL."users");

    }

    private static function CallModel(){

        return new users_model();

    }

} 