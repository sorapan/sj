<?php

class login extends Controller{

    function __construct() {

        parent::__construct();
        Session::init();

    }

    function index(){

        $this->view->render("login/index",1);

    }

    function CheckLogin(){

        self::CallModel()->CheckLogin();

    }

    private static function CallModel(){

        return new login_model();

    }

} 