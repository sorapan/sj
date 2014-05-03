<?php

class login_model extends Model{

    function __construct(){

        parent::__construct();

    }

    function CheckLogin(){

        $sth = $this->db->prepare("SELECT * FROM user WHERE `username` = :user AND `password` = :pass");
        $sth->execute(array(
            ':user' => $_POST['user'],
            ':pass' => $_POST['pass']
        ));

        $data = $sth->fetch();
        $count =  $sth->rowCount();

        if($count > 0){

            Session::init();
//            Session::set('user_id', $data['id']);
            Session::set('login', true);
            Session::set('sayhi', 0);
            Session::set('username', $data['username']);
            Session::set('role', $data['class']);
            Session::set('user_id', $data['id']);
            header("location: ".URL);

        }else{

            header("location: ".URL."login");

        }

    }

} 