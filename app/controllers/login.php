<?php

class login extends Controller{

    function __construct() {

        parent::__construct();
        Session::init();

        $this->view->css = array("login/css/style.css");
    }

    function index(){

        $this->view->render_2("login/index");

    }

    function CheckLogin(){

        self::CallModel()->CheckLogin();

    }

    private static function CallModel(){

        return new login_model();

    }

} 