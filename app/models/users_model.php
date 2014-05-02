<?php

class users_model extends Model{

    function __construct(){

        parent::__construct();

    }

    function index(){

        $query = $this->db->prepare("SELECT * FROM `user`");
        $query->execute();
        $ans = $query->fetchAll();

        return $ans;

    }

    function Backup(){

        $name = date("Y-m-d-H-i-s");
        $cd = '"C:\Program Files\MySQL\MySQL Server 5.6\bin\mysqldump" -h'.DB_HOST.' -u'.DB_USER.' -p'.DB_PASS.' '.DB_NAME.' > sql_backup/'.$name.'.sql';
        exec($cd);

    }


    function singleRow($id){

        $query = $this->db->prepare(" SELECT * FROM `user` WHERE `id` = :id LIMIT 1");
        $query->execute(array(
            ":id" => $id
        ));
        $ans = $query->fetch();

        return $ans;

    }

    function editsave($data){

        $query = $this->db->prepare(" UPDATE user SET `username`=:username, `password`=:password, `class`=:class WHERE `id` = :id");
        $query->execute(array(
            ":username" => $data['username'],
            ":password" => $data['password'],
            ":class" => $data['class'],
            ":id" => $data['id'],
        ));


    }

    function delete($id){

        $query = $this->db->prepare(" DELETE FROM user WHERE `id` = :id LIMIT 1");
        $query->execute(array(
            ":id" => $id
        ));

    }

    function insert($data){

        $query = $this->db->prepare(" INSERT INTO user (`username`,`password`,`class`) VALUES (:username,:password,:class) ");
        $query->execute(array(
            ":username" => $data['username'],
            ":password" => $data['password'],
            ":class" => $data['class']
        ));

//        This is Debug query
//        print_r($query->errorInfo());

    }

} 