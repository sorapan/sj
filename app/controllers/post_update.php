<?php

class post_update extends Controller{

    function __construct() {

        parent::__construct();
        Session::init();
        Session::set('sayhi', 0);
        $this->view->css = array("post_update/css/post_update.css");
        $this->view->js = array("post_update/js/post_update.js");

    }

    function index(){

        header("location:".URL);

    }

    function id($topicid){

        $this->view->status = $this->checkTopicStatus2($topicid);
        $this->view->render("post_update/id");
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
            'note' => $_POST['postnote'],
            'topicid' => $_POST['topic_id'],
            'userid' => Session::get('user_id')
        );
        self::CallModel()->updateTopic($data);
        $topic_id = $_POST['topic_id'];
        self::mmove("temp/".Session::get('user_id'),"file/".$topic_id);
        Session::set('sayhi', 0);
        $status = $this->checkTopicStatus2($_POST['topic_id']);

        $imgs = scandir("file/".$topic_id."/img".$status);
        foreach($imgs as $img){
            if($img != "." && $img != "..") self::CallModel()->storeImg($img,$topic_id,'img');
        }
        if(is_dir("file/".$topic_id."/fin")){

            $fins = scandir("file/".$topic_id."/fin");
            foreach($fins as $fin){
                if($fin != "." && $fin != "..") self::CallModel()->storeImg($fin,$topic_id,'fin');
            }

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

    function checkTopicStatus(){
        $result = self::CallModel()->getTopicStatus($_POST['topic_id']);
        echo $result;
    }

    function checkTopicStatus2($topicid){
        $result = self::CallModel()->getTopicStatus($topicid);
        return $result;
    }

    function uploadImg2(){

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

    function uploadImg3(){

        Session::init();
        $dir = "temp/".Session::get('user_id')."/img3";
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

    // private

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
                    }
                }
            }
        }
    }

} 