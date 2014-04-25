<?php

class post extends Controller{

    function __construct() {

        parent::__construct();
        Session::init();
        Session::set('sayhi', 0);
//        Session::checkLogin();

        $this->view->css = array("post/css/post_style.css");
        $this->view->js = array("post/js/PushData.js",
                                "post/js/upload_img2.js"
//                                "post/js/upload_img.js"
        );
    }

    function index(){
        $this->view->render("post/index");
        if(Session::get('sayhi') == 0){
            if(is_dir("temp/".Session::get('user_id')."/")){
                self::mrmdir("temp/".Session::get('user_id'));
//                rmdir("temp/".Session::get('user_id'));
            }
        }
    }

    function PushData(){
        Session::init();
        $data = array(
            'header' => $_POST['header'],
            'note' => $_POST['note'],
            'userid' => Session::get('user_id')
        );
        self::CallModel()->PushData($data);
        $topic_id = self::CallModel()-> GetTopicId2();
        self::mmove("temp/".Session::get('user_id'),"file/".$topic_id);
        Session::set('sayhi', 0);
        $files = scandir("file/".$topic_id);
        foreach($files as $file){
            if($file != "." && $file != ".."){
                $infile = scandir("file/".$topic_id."/".$file);
                foreach($infile as $if){
                    if($if != "." && $if != "..") self::CallModel()->storeImg($if,$topic_id,$file);
                }
            }
        }
    }

    function uploadImg(){
        Session::init();
        $dir = "temp/".Session::get('user_id')."/img";
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

    function uploadFile($type){
        Session::init();
        $dir = "temp/".Session::get('user_id')."/".$type;
//        $dir = "temp/qwer/.$type";
        if(!is_dir($dir)){
            mkdir($dir,0777, true);
            Session::set('sayhi', 1);
            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
                move_uploaded_file( $_FILES["img"]["tmp_name"], $dir."/".$_FILES['img']['name']);
            }
            echo $dir."/".$_FILES['img']['name'];
        }else{
            if(Session::get('sayhi') == 0){
                self::mrmdir($dir);
                mkdir($dir,0777, true);
                Session::set('sayhi', 1);
            }
            if($_FILES["img"]["error"] == UPLOAD_ERR_OK){
                move_uploaded_file( $_FILES["img"]["tmp_name"], $dir."/".$_FILES['img']['name']);
            }
            echo $dir."/".$_FILES['img']['name'];
        }
    }

    function delImg(){
        unlink($_POST['del']);
    }


///////////////// Directory Management's method /////////////////

    private static function mrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $obj) {
                if($obj != "." && $obj != "..") {
                    if (filetype($dir."/".$obj) == "dir"){
//                        rmdir($dir."/".$obj);
                        $sub_dir = scandir($dir."/".$obj);
                        foreach($sub_dir as $subobj){
                            if($subobj != "." && $subobj != ".."){
                                if(filetype($dir."/".$obj."/".$subobj) == "dir"){
                                    rmdir($dir."/".$obj."/".$subobj);
                                }else{
                                    unlink($dir."/".$obj."/".$subobj);
                                }
                            }
                        }
                    }else{
                        unlink($dir."/".$obj);
                    }
                }
            }
//            reset($objects);
            $objects = scandir($dir);
            foreach ($objects as $obj){
                if($obj != "." && $obj != ".."){
                    rmdir($dir."/".$obj);
                }
            }
            rmdir($dir);
        }

    }

    private static function mmove($source,$destination){

        mkdir($destination);
        $god = scandir($source);
        foreach($god as $file){
            if($file != "." || $file != ".."){
                if(filetype($source."/".$file) == "dir"){
                    if(!is_dir($destination."/".$file))mkdir($destination."/".$file);
                    $subsource = scandir($source."/".$file);
                    foreach($subsource as $ss){
                        if($ss != "." || $ss != ".."){
                            @copy($source."/".$file."/".$ss,$destination."/".$file."/".$ss);
                            @unlink($source."/".$file."/".$ss);
                        }
                        rmdir($source."/".$file."/".$ss);
                    }
                    rmdir($source."/".$file);
                }
            }
        }
        rmdir($source);
    }

    private static function CallModel(){
        return new post_model();
    }

} 