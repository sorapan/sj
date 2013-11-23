<?php

class login_model extends Model{

    function __construct(){

        parent::__construct();

    }

    function CheckLogin(){

        $sth = $this->db->prepare("SELECT id FROM user WHERE `username` = :login AND `password` = :password");
        $sth->execute(array(
            ':login' => $_POST['user'],
            ':password' => $_POST['pass']
        ));

        $data = $sth->fetch();
        $count =  $sth->rowCount();

        if($count > 0){

            Session::start();
            Session::set('user_id', $data['id']);
            Session::set('login', true);

            header("location: ".URL);

        }else{

            header("location: ../login");

        }

    }

} 