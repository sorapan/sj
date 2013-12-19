<?php

class topic extends Controller{

    function __construct(){

        parent::__construct();

    }

    function index(){

        header("location:".URL."topic/id");

    }

    function id($id){

        if(!empty($id)){

            $this->view->var = $id;

        }
        $this->view->render("topic/id");

    }

} 