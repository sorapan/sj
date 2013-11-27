<?php

class users extends Controller{

    function __construct(){

        parent::__construct();

    }

    function index(){

        $this->view->data = self::CallModel()->index();
        $this->view->render("usrs/index");

    }

    private static function CallModel(){

        return new users_model();

    }

} 