<?php

class error extends Controller{

    function __construct(){

        parent::__construct();

    }

    public function index(){

        $this->view->msg = " ERROR : This page dosen't exists ";
        $this->view->render('error/index');

    }

}