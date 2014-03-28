<?php

class post_update extends Controller{

    function __construct() {

        parent::__construct();

        Session::init();

    }

    function index(){

        $this->view->render("post_update/index");

    }

} 