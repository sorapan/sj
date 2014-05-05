<?php

class search extends Controller{

    function __construct(){

        parent::__construct();
        $this->view->css = array(
            'search/css/search.css'
        );
        $this->view->js = array(
            'search/js/search.js'
        );

    }

    function index(){

        $this->view->render_none("search/index");

    }

    function fetch(){

        $res = self::CallModel()->fetch($_POST['word'],$_POST['choice']);
        echo json_encode($res);

    }

    private static function CallModel(){
        return new search_model();
    }

}