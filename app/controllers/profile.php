<?php

class profile extends Controller{

    function __construct(){

        parent::__construct();
        $this->view->css = array("profile/css/minibox.css");

    }

    function index(){

        header("location:".URL."profile/id");

    }

    function id(){

        $this->view->render("profile/id");

    }

} 