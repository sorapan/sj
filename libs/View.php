<?php

class View {

    function __construct(){


    }

    public function render($name){

        require "asset/layout/layout1.php";

    }

    public function render_2($name){

        require "asset/layout/layout2.php";

    }

    public function render_none($name){

        require "app/views/" . $name . ".php";

    }

}