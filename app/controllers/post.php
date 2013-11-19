<?php

class post extends Controller{

    function __construct() {

        parent::__construct();

    }

    function index(){

        $this->view->css = array("");
        $this->view->render("post/index");

    }

} 