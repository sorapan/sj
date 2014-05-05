<?php

class search_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetch($var,$choi){

        if($choi == "header"){

            $sql = "SELECT * FROM post JOIN user ON post.user_id = user.id WHERE header LIKE :var";

        }else{

            $sql = "SELECT * FROM post JOIN user ON post.user_id = user.id WHERE detail LIKE :var";

        }

        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':var' => '%'.$var.'%'
        ));
        return $query->fetchAll();

    }

}