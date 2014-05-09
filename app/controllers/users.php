<?php

class users extends Controller{

    function __construct(){

        parent::__construct();

        $this->view->css = array(
            "users/css/users_style.css",
            "users/css/create.css",
            "users/css/backup.css"
        );
        $this->view->js = array(
            "users/js/users_pagecontrol.js"
        );

    }

    function index(){

        if(Session::get('role')=="user"){
            header("location:".URL."error/d9");
        }else{
            $this->view->data = self::CallModel()->index();
            $this->view->render("users/index");
        }

    }

    function createuser(){

        $this->view->render_none('users/createuser');

    }

    function Backup(){

        $this->view->render_none("users/backup");

    }

    function Backupit(){

        self::CallModel()->Backup();

    }

    function edit($id){

        $this->view->target = self::CallModel()->singleRow($id);
        $this->view->render_none("users/edit");

    }


    function delete($id){

        self::CallModel()->delete($id);
        header("location:".URL."users");

    }

    function editsave($id){

        $data = array(

            "id" => $id,
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