<?php

class logout extends Controller{

    function __construct(){

        parent::__construct();

    }

    function logout(){

        Session::init();
        Session::destroy();
        header("location: ".URL."login");

    }

} 