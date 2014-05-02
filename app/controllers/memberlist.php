<?php

class memberlist extends Controller{

    function __construct(){

        parent::__construct();
<<<<<<< HEAD
        $this->view->js = array(
            'memberlist/js/memberlist.js',
            'memberlist/js/chat.js',
        );
=======
        $this->view->js = array('memberlist/js/chat.js');
>>>>>>> origin/new_layout
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

<<<<<<< HEAD
        $this->view->render_none('memberlist/render');
=======
        $this->view->render('memberlist/render');
>>>>>>> origin/new_layout

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
        $NewLastTime =  self::CallModel()->lastTimestamp();

        //long polling
        while($timeout > 0){
            if($NewLastTime <= $LastTime){

                $timeout--;
                $NewLastTime = self::CallModel()->lastTimestamp();
                clearstatcache();
                flush();
                usleep(100000);

            }else{
                break;
            }
        }
        if($timeout > 0){

            if($_POST['timestamp'] == null)echo $this->data();
            else echo $this->data_last();

        }

        Session::init();

    }

    function data(){

        Session::init();
        $result = self::CallModel()->fetchChatMessage(Session::get('user_id'),$_POST['p']);
        $arr = array();
        foreach($result as $key=>$res){
            $arr[$key]['msg'] = $res['message'];
            $arr[$key]['date'] = date('d/m/Y - h:i A',(int)$res['date']);
            $arr[$key]['sender'] = self::Num2Name($res['sender']);
            $arr[$key]['receiver'] = self::Num2Name($res['receiver']);
        }
        $arr[0]['timestamp'] = self::CallModel()->lastTimestamp();
        return json_encode($arr);

    }

    function data_last(){

        Session::init();
        $result = self::CallModel()->fetchChatMessage_last(Session::get('user_id'),$_POST['p']);
        $arr = array();
        $res = $result[0];

        $arr['msg'] = $res['message'];
        $arr['date'] = date('d/m/Y - h:i A',(int)$res['date']);
        $arr['sender'] = self::Num2Name($res['sender']);
        $arr['receiver'] = self::Num2Name($res['receiver']);

        $arr['timestamp'] = self::CallModel()->lastTimestamp();
        return json_encode($arr);

    }

    private static function Num2Name($num){
        $res = self::CallModel()->Num2Name($num);
        if($res == Session::get('username')) $res = 'คุณ';
        return $res;
    }

    private static function CallModel(){
        return new memberlist_model();
    }

} 