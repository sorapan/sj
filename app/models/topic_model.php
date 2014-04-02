<?php

class topic_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetch_img($id){

        $query = $this->db->prepare("SELECT `topic_id`,`img_name` FROM `img` WHERE `topic_id` = :id");
        $query->execute(array(

            ":id" => $id

        ));

        return $query->fetchAll();

    }

    function topic_info($id){

//        $query = $this->db->prepare("SELECT * FROM `post` WHERE `topicID` = :id LIMIT 1");
        $query = $this->db->prepare("SELECT `topicID`,`header`,`content`,`date`,`username` FROM `post` JOIN `user` ON `post`.`user_id` = `user`.`id` WHERE `topicID` = :id LIMIT 1");
        $query->execute(array(

            ":id" => $id

        ));

        return $query->fetch();

    }
}