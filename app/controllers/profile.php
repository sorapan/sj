<?php

class profile extends Controller{

    function __construct(){

        parent::__construct();

    }

    function index(){

        header("location:".URL."profile/id");

    }

    function id(){

        echo "hello";

    }

} 