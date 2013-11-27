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

    function create(){

        

    }

    function insert($data){

        $query = $this->db->prepare(" INSERT INTO user (`username`,`password`,`class`) VALUES (:username,:password,:class) ");
        $query->execute(array(
            ":username" => $data['username'],
            ":password" => $data['password'],
            ":class" => $data['class'],
        ));

//        This is Debug query
//        print_r($query->errorInfo());

    }

} 