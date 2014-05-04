<?php

class tpmanage extends Controller{

    function __construct(){

        parent::__construct();
        $this->view->css = array(
            "tpmanage/css/tpmanage_style.css"
        );

    }

    function index(){

        header("location:".URL);

    }

    function edit(){

        $this->view->render('tpmanage/edit');

    }

    function fetchImg(){



    }


}