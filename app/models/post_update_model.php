<?php

class post_update_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function updateTopic($arr){

        $status = $this->getTopicStatus($arr['topicid']);
        if($status == "1") $note = 'note2';
        else if($status == "2") $note = 'note3';
        $sql = "UPDATE post SET `".$note."`=:note, `user_id2`=:userid, `status`='2', `last_update`=:now WHERE `topicID`= :topicid";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':note' => $arr['note'],
            ':userid' => $arr['userid'],
            ':now' => time(),
            ':topicid' => $arr['topicid']
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

        $qry = $this->db->prepare("INSERT INTO img (`img_name`,`topic_id`,`status`,`type`) VALUES (:imgname, :topicid, 2, :type)");
        $qry->execute(array(

            ':imgname' => $imgname,
            ':topicid' => $topicid,
            ':type' => 'img'

        ));

    }

} 