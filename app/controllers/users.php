<?php

class users extends Controller{

    function __construct(){

        parent::__construct();


        $this->view->css = array("users/css/users_style.css");

    }

    function index(){

        $this->view->data = self::CallModel()->index();
        $this->view->render("users/index");

    }

    function edit($id){

        $this->view->target = self::CallModel()->singleRow($id);

        $this->view->render("users/edit");

    }

    private static function CallModel(){

        return new users_model();

    }

} 