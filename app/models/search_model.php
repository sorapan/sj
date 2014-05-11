<?php

class search_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetch($choi,$veri){


        $sql = "SELECT * FROM post JOIN user ON post.user_id = user.id WHERE verify $veri  $choi";

//        echo $sql;

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

}