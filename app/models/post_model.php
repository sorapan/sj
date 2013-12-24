<?php

class post_model extends Model{

    function __construct() {

        parent::__construct();

    }


    function PushData($data){

        if(is_array($data)){

            $query = $this->db->prepare(" INSERT INTO post (`topicID`,`user_id`, `header`, `content`, `date`)".
                "VALUES (:topicID, :userid, :header, :content, :date) ");
            $query->execute(array(
                ':userid' => "1",
                ':header' => $data['header'],
                ':content' => $data['content'],
                ':topicID' => $this->GetTopicId(),
                ':date' =>  time()
            ));

//            use for check error
//            echo "\nPDO::errorInfo():\n";
//            print_r($query->errorInfo());

        }else{

            echo 'something is wrong';

        }

    }

    function GetTopicId(){

        $qry = $this->db->prepare("SELECT id FROM post ORDER BY id DESC LIMIT 1");
        $qry->execute();
        $result = $qry->fetch();
        if($result == null){

            return sprintf("%06s",0);

        }else{

            $int = (int)$result['id']+1;
            return sprintf("%06s",$int);

        }

    }


} 