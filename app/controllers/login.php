<?php

class login extends Controller{

    function __construct() {

        parent::__construct();

    }

    function index(){

        $this->view->render("login/index",1);

    }

} 