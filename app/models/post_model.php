<?php

class post_model extends Model{

    function __construct() {

        parent::__construct();

    }


    function PushData($data){

        if(is_array($data)){

            $query = $this->db->prepare(" INSERT INTO post (`topicID`,`user_id`, `header`, `note`, `date`, `last_update`)".
                "VALUES (:topicID, :userid, :header, :note, :date, :last_update) ");
            $query->execute(array(
                ':userid' => $data['userid'],
                ':header' => $data['header'],
                ':note' => $data['note'],
                ':topicID' => $this->GetTopicId(),
                ':date' =>  time(),
                ':last_update' => time()
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

            $int = (int)$result['id']+1;
            return sprintf("%06s",$int);

    }

    function GetTopicId2(){

        $qry = $this->db->prepare("SELECT id FROM post ORDER BY id DESC LIMIT 1");
        $qry->execute();
        $result = $qry->fetch();

        $int = (int)$result['id'];
        return sprintf("%06s",$int);

    }

    function storeImg($imgname, $topicid, $type){

        $qry = $this->db->prepare("INSERT INTO img (`img_name`,`topic_id`,`status`,`type`) VALUES (:imgname, :topicid, 1, :type)");
        $qry->execute(array(

            ':imgname' => $imgname,
            ':topicid' => $topicid,
            ':type' => $type

        ));

    }


} 