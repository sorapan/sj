<?php

class memberlist extends Controller{

    function __construct(){

        parent::__construct();
        $this->view->js = array('memberlist/js/chat.js');
        $this->view->css = array(
            'memberlist/css/memberlist.css',
            'memberlist/css/chat.css'
        );

    }

    function index(){

        $this->view->mbl = self::CallModel()->fetchMemberlist();
        $this->view->render('memberlist/index');

    }

    function chat($userid){

        $this->view->render('memberlist/render');

    }

    function pushMessage(){

        Session::init();
        $data = array(
          'message' => $_POST['msg'],
          'sd' => Session::get('user_id'),
          'rc' => $_POST['rc'],
        );
        self::CallModel()->getMessage($data);

    }

    function polling(){

        session_write_close();
        ini_set('max_execution_time', 31);
        $timeout = 260; //300

        $LastTime = $_POST['timestamp'];
        $NewLastTime =  self::CallModel()->TimeStamp();
        while($timeout > 0){
            if($NewLastTime <= $LastTime){

                $timeout--;
                $NewLastTime = self::CallModel()->TimeStamp();

                clearstatcache();
                flush();
                usleep(100000);

            }else{
                break;
            }
        }

    }


    private static function CallModel(){
        return new memberlist_model();
    }

} 