<?php

class tpmanage_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetchAllPost($topicid){

        $query = $this->db->prepare("SELECT * FROM post WHERE topicID = :topicid LIMIT 1");
        $query->execute(array(
            ":topicid" => $topicid
        ));

        return $query->fetch();

    }

    function fetchAllImg($topicid,$status){

        $query = $this->db->prepare("SELECT * FROM img WHERE topic_id = :topicid AND status = :status");
        $query->execute(array(
            ":topicid" => $topicid,
            ":status" => $status
        ));

           return $query->fetchAll();

    }

    function UpdateData($data,$topicid){

        $query = $this->db->prepare("UPDATE post SET header=:header,note=:note,note2=:note2,note3=:note3 WHERE topicID = :topicid");
        $query->execute(array(
            ':header' => $data['header'],
            ':note' => $data['note'],
            ':note2' => $data['note2'],
            ':note3' => $data['note3'],
            ':topicid' => $topicid
        ));

    }

    function gotImg($imgname, $topicid,$status, $type){

        $query = $this->db->prepare("INSERT INTO img (`img_name`,`topic_id`,`status`,`type`) VALUES (:imgname, :topicid, :status, :type)");
        $query->execute(array(
            ':imgname' => $imgname,
            ':topicid' => $topicid,
            ':type' => $type,
            ':status' => $status
        ));
        $query->fetchAll();

    }

    function GetTopicId2(){

        $qry = $this->db->prepare("SELECT id FROM post ORDER BY id DESC LIMIT 1");
        $qry->execute();
        $result = $qry->fetch();

        $int = (int)$result['id'];
        return sprintf("%06s",$int);

    }

    function DelImg($img){

        $query = $this->db->prepare("DELETE FROM img WHERE img_name = :img");
        $query->execute(array(
            ':img' => $img
        ));

    }

}