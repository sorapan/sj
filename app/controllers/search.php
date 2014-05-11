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

        if($_POST['choice'] == "all") $choi = " ";
        else $choi = "AND ".$_POST['choice']." LIKE '%".$_POST['word']."%'";

        if($_POST['veri'] == "all") $veri = "IN ('N','Y')";
        else if($_POST['veri'] == "no") $veri = "= 'N' ";
        else if($_POST['veri'] == "yes") $veri = "= 'Y' ";

        $res = self::CallModel()->fetch($choi,$veri);
        echo json_encode($res);

    }

    private static function CallModel(){
        return new search_model();
    }

}