<?php

class tpmanage extends Controller{

    function __construct(){

        parent::__construct();
        Session::init();
        Session::set('sayhi', 0);
        $this->view->css = array(
            "tpmanage/css/tpmanage_style.css"
        );
        $this->view->js = array(
            "tpmanage/js/edit.js"
        );

    }

    function index(){

        header("location:".URL);

    }

    function edit($topicid){

        if(Session::get('sayhi') == 0){
            if(is_dir("temp/".Session::get('user_id')."/")){
                self::mrmdir("temp/".Session::get('user_id'));
//                rmdir("temp/".Session::get('user_id'));
            }
        }
        $this->view->topicid = $topicid;
        $this->view->info = self::CallModel()->fetchAllPost($topicid);
        $this->view->render('tpmanage/edit');

    }

    function delImg(){

        @unlink($_POST['del']);
        $aa = explode('/',$_POST['del'],4);
        self::CallModel()->DelImg(end($aa));

    }

    function fetchImg(){

        $arr = Array();
        $img = Array();
        $img2 = Array();
        $img3 = Array();
        $doc =  self::CallModel()->fetchAllImg($_POST['topicid'],'1');
        $doc2 =  self::CallModel()->fetchAllImg($_POST['topicid'],'2');
        $doc3 =  self::CallModel()->fetchAllImg($_POST['topicid'],'3');
        foreach($doc as $k=>$v){

            if($v['type']=="grom") $arr['grom'] = $v['img_name'];
            if($v['type']=="crame") $arr['crame'] = $v['img_name'];
            if($v['type']=="drive") $arr['drive'] = $v['img_name'];
            if($v['type']=="cussy") $arr['cussy'] = $v['img_name'];
            if($v['type']=="img"){
                array_push($img,$v['img_name']);
            }

        }

        foreach($doc2 as $k=>$v){
            if($v['type']=="img") array_push($img2,$v['img_name']);
        }

        foreach($doc3 as $k=>$v){
            if($v['type']=="img") array_push($img3,$v['img_name']);
            if($v['type']=="fin") $arr['fin'] = $v['img_name'];
        }

        $arr['img'] = $img;
        $arr['img2'] = $img2;
        $arr['img3'] = $img3;

        echo json_encode($arr);

    }

    function Pushdata(){

        $status = "1";
        $data = array(
            'header' => $_POST['header'],
            'detail' => $_POST['detail'],
            'note' => $_POST['note']
        );
        if(isset( $_POST['note2'])&& $_POST['note2']!= "") $data['note2'] = $_POST['note2'];
        else $data['note2'] = "";
        if(isset( $_POST['note3'])&& $_POST['note3']!= "") $data['note3'] = $_POST['note3'];
        else $data['note3'] = "";

        self::CallModel()->UpdateData($data,$_POST['topicid']);
        Session::set('sayhi', 0);
        $a = scandir("temp/".Session::get('user_id'));
        foreach($a as $aa){
            if($aa != "." && $aa != ".."){
                $q = scandir("temp/".Session::get('user_id')."/".$aa);
                foreach($q as $qq){
                    if($aa == "img2" || $aa == "img3"){
                        if($aa == "img2") $status = "2";
                        else if($aa == "img3") $status = "3";
                        $aa = "img";
                    }else if($aa == "fin"){
                        $status = "3";
                        $aa = "fin";
                    }
                    if($qq != "." && $qq != "..") self::CallModel()->gotImg($qq,$_POST['topicid'],$status,$aa);
                }
            }
        }
        self::mmove("temp/".Session::get('user_id'),"file/".$_POST['topicid']);


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
        return new tpmanage_model();
    }

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