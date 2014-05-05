<?php

class post_update_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function updateTopic($arr){

//        $user_id = 'user_id';
//        $note = 'note';
//        $stat = '1';
        $status = $this->getTopicStatus($arr['topicid']);
        if($status == "1") {
            $user_id = 'user_id2';
            $note = 'note2';
            $stat = '2';
        }
        else if($status == "2") {
            $user_id = 'user_id3';
            $note = 'note3';
            $stat = '3';
        }
        $sql = "UPDATE post SET `".$note."`=:note, `".$user_id."`=:userid, `status`=:status, `last_update`=:now WHERE `topicID`= :topicid";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':note' => $arr['note'],
            ':userid' => $arr['userid'],
            ':now' => time(),
            ':topicid' => $arr['topicid'],
            ':status' => $stat
        ));

    }

    function getTopicStatus($topicid){

        $query = $this->db->prepare("SELECT `status` FROM post WHERE `topicID` = :topicid");
        $query->execute(array(
            ':topicid' => $topicid
        ));
        $result = $query->fetch();
        return $result['status'];

    }

    function storeImg($imgname, $topicid){

        $status = $this->getTopicStatus($topicid);
        $qry = $this->db->prepare("INSERT INTO img (`img_name`,`topic_id`,`status`,`type`) VALUES (:imgname, :topicid, :status, :type)");
        $qry->execute(array(

            ':imgname' => $imgname,
            ':topicid' => $topicid,
            ':type' => 'img',
            ':status' => $status

        ));

    }

} 