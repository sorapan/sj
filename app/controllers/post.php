<?php

class post extends Controller{

    function __construct() {

        parent::__construct();

        Session::init();
//        Session::checkLogin();


        $this->view->css = array("post/css/post_style.css");
        $this->view->js = array("post/js/PushData.js",
                                "post/js/form_control.js",
                                "post/js/form_control2.js",
                                "post/js/upload_img.js");

    }

    function index(){

        $this->view->render("post/index");

    }

    function PushData(){

        Session::init();

        $data = array(
            'header' => $_POST['header'],
            'content' => $_POST['content'],
            'userid' => Session::get('user_id')
        );

        self::CallModel()->PushData($data);

        $topic_id = self::CallModel()-> GetTopicId2();
        self::mmove("temp/".Session::get('username'),"file/".$topic_id);
        Session::set('sayhi', 0);
        $files = scandir("file/".$topic_id);
        foreach($files as $file){

            if($file != "." && $file != ".."){

                self::CallModel()->storeImg($file,$topic_id);

            }

        }

    }

    function uploadImg(){

        Session::init();

        $dir1 = "temp";
        $dir2 = Session::get('username');

        if(!is_dir($dir1."/".$dir2)){

            mkdir($dir1."/".$dir2);
            Session::set('sayhi', 1);

            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){

                move_uploaded_file( $_FILES["img"]["tmp_name"], $dir1."/".$dir2."/".$_FILES['img']['name']);

            }

            echo $dir1."/".$dir2."/".$_FILES['img']['name'];

        }else{

            if(Session::get('sayhi') == 0){
                self::mrmdir($dir1."/".$dir2);
                mkdir($dir1."/".$dir2);
                Session::set('sayhi', 1);
            }

            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){

                move_uploaded_file( $_FILES["img"]["tmp_name"], $dir1."/".$dir2."/".$_FILES['img']['name']);

            }

            echo $dir1."/".$dir2."/".$_FILES['img']['name'];

        }

    }

///////////////// Directory Management's method /////////////////

    private static function mrmdir($dir) {

        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {

                if ($object != "." && $object != "..") {

                    if (filetype($dir."/".$object) == "dir"){

                        rmdir($dir."/".$object);

                    }else{

                        unlink($dir."/".$object);

                    }
                }
            }

            reset($objects);
            rmdir($dir);
        }

    }

    private static function mmove($source,$destination){

        mkdir($destination);
        $god = scandir($source);
        foreach($god as $file){

            if($file != "." || $file != ".."){

                @copy($source."/".$file,$destination."/".$file);
                @unlink($source."/".$file);

            }
        }

        rmdir($source);

    }

    function delImg(){

        unlink($_POST['del']);

    }

    private static function CallModel(){

        return new post_model();

    }

} 