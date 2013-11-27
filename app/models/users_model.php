<?php

class users_model extends Model{

    function __construct(){

        parent::__construct();

    }

    function index(){

        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();
        $ans = $query->fetchAll();

        return $ans;

    }

    function singleRow($id){

        $query = $this->db->prepare(" SELECT * FROM user WHERE id = :id LIMIT 1");
        $query->execute(array(
            ":id" => $id
        ));
        $ans = $query->fetch();

        return $ans;

    }

} 