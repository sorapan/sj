<?php

class post extends Controller{

    function __construct() {

        parent::__construct();

    }

    function index(){

        $this->view->css = array("post/css/post_style.css");
        $this->view->js = array("post/js/SendData.js");
        $this->view->render("post/index");

    }

} 