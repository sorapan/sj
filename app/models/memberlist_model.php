<?php

class memberlist_model extends Model{

    function __construct(){

        parent::__construct();

    }

    function fetchMemberlist(){

        $query = $this->db->prepare('SELECT * FROM `user` ORDER BY `id`');
        $query->execute();
        $result = $query->fetchAll();
        return $result;

    }

    function getMessage($data){

        $query = $this->db->prepare('INSERT INTO `chatmessage` (`message`,`date`,`sender`,`receiver`) VALUES (:message,:date,:sender,:receiver)');
        $query->execute(array(
            ':message' => $data['message'],
            ':date' => time(),
            ':sender' => $data['sd'],
            ':receiver' => $data['rc']
        ));
//        echo "\nPDO::errorInfo():\n";
//        print_r($query->errorInfo());

    }

    function fetchChatMessage(){


    }

}