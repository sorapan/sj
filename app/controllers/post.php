<?php

class post extends Controller{

    function __construct() {

        parent::__construct();

//        Session::init();
//        $login  = Session::get('login');
//
//        if($login != true){
//
//            Session::destroy();
//            header("location: ".URL."login");
//            exit;
//
//        }


        $this->view->css = array("post/css/post_style.css");
        $this->view->js = array("post/js/PushData.js",
                                "post/js/form_control.js",
                                "post/js/upload_img.js");

    }

    function index(){

        $this->view->render("post/index");

    }

    function PushData(){

        $data = array(
            'header' => $_POST['header'],
            'content' => $_POST['content']
        );

        self::CallModel()->PushData($data);

    }

    function uploadImg(){


        $topic_id = self::CallModel()->GetTopicId();

        if(!is_dir("file/".$topic_id."/")){

            mkdir("file/".$topic_id);

            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){

                move_uploaded_file( $_FILES["img"]["tmp_name"], "file/".$topic_id."/".$_FILES['img']['name']);

            }

            echo "file/".$topic_id."/".$_FILES['img']['name'];

        }else{

            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){

                move_uploaded_file( $_FILES["img"]["tmp_name"], "file/".$topic_id."/".$_FILES['img']['name']);

            }

            echo "file/".$topic_id."/".$_FILES['img']['name'];

        }

    }

    function delImg(){

        unlink($_POST['del']);

    }


    private static function CallModel(){

        return new post_model();

    }

} 