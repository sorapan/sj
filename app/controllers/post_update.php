<?php

class post_update extends Controller{

    function __construct() {

        parent::__construct();
        Session::init();
        $this->view->css = array("post_update/css/post_update.css");
        $this->view->js = array("post_update/js/post_update.js");

    }

    function index(){

        header("location:".URL);

    }

    function id(){

        $this->view->render("post_update/id");

    }
    function PushData($topicid){

        Session::init();
        $data = array(
            'note' => $_POST['note'],
            'userid' => Session::get('user_id')
        );

    }

    function uploadImg(){

        Session::init();
        $dir = "temp/".Session::get('user_id')."/img2";
        if(!is_dir($dir)){
            mkdir($dir,0777, true);
            Session::set('sayhi', 1);
            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
                move_uploaded_file( $_FILES["img"]["tmp_name"], $dir."/".$_FILES['img']['name']);
            }
            echo $dir."/".$_FILES['img']['name'];
        }else{
            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
                move_uploaded_file( $_FILES["img"]["tmp_name"], $dir."/".$_FILES['img']['name']);
            }
            echo $dir."/".$_FILES['img']['name'];
        }

    }

    private static function CallModel(){
        return new post_update_model();
    }

} 