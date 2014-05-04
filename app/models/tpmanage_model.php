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

    function DelImg($img){

        $query = $this->db->prepare("DELETE FROM img WHERE img_name = :img");
        $query->execute(array(
            ':img' => $img
        ));

    }

}