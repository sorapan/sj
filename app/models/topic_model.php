<?php

class topic_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetch_img($id){
        $query = $this->db->prepare("SELECT * FROM `img` WHERE `topic_id` = :id AND `type` != 'img'");
        $query->execute(array(
            ":id" => $id
        ));
        return $query->fetchAll();
    }

    function fetch_carimg($id){
        $query = $this->db->prepare("SELECT * FROM `img` WHERE `topic_id` = :id AND `type` = 'img' AND `status` = '1' ");
        $query->execute(array(
            ":id" => $id
        ));
        return $query->fetchAll();
    }

    function fetch_carimg2($id){
        $query = $this->db->prepare("SELECT * FROM `img` WHERE `topic_id` = :id AND `type` = 'img' AND `status` = '2' ");
        $query->execute(array(
            ":id" => $id
        ));
        return $query->fetchAll();
    }

    function fetch_carimg3($id){
        $query = $this->db->prepare("SELECT * FROM `img` WHERE `topic_id` = :id AND `type` = 'img' AND `status` = '3' ");
        $query->execute(array(
            ":id" => $id
        ));
        return $query->fetchAll();
    }

    function topic_info($id){
//        $query = $this->db->prepare("SELECT * FROM `post` WHERE `topicID` = :id LIMIT 1");
        $query = $this->db->prepare("SELECT * FROM `post` JOIN `user` ON `post`.`user_id` = `user`.`id` WHERE `topicID` = :id LIMIT 1");
        $query->execute(array(
            ":id" => $id
        ));
        return $query->fetch();
    }

    function Verify($id){

        $query = $this->db->prepare("UPDATE post SET `verify` = :verify WHERE `topicID` = :id");
        $query->execute(array(
            ':verify' => 'Y',
            ':id' => $id
        ));

    }
}