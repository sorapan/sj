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

    function SetViewAll($receiver){

        $query = $this->db->prepare('UPDATE chatmessage SET viewed = "Y" WHERE receiver = :receiver');
        $query->execute(array(
            ':receiver' => $receiver
        ));

    }

    function getunread($s,$r){

        $query = $this->db->prepare('SELECT count(viewed) FROM chatmessage WHERE sender = :s AND receiver = :r AND viewed = "N"');
        $query->execute(array(
            ':s' => $s,
            ':r' => $r
        ));
        return $query->fetch();


    }

    function countUnread($receiver){

        $query = $this->db->prepare('SELECT count(viewed) FROM chatmessage WHERE receiver = :receiver AND viewed = "N"');
        $query->execute(array(
            'receiver' => $receiver
        ));
        return $query->fetch();

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

    function fetchChatMessage($p1,$p2){

        $sql = "SELECT * FROM chatmessage WHERE sender=:p1 AND receiver=:p2 OR sender=:p2 AND receiver=:p1 ORDER BY date DESC ";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':p1' => $p1,
            ':p2' => $p2
        ));
        return $query->fetchAll();

    }

    function fetchChatMessage_last($p1,$p2){

        $sql = "SELECT * FROM chatmessage WHERE sender=:p1 AND receiver=:p2 OR sender=:p2 AND receiver=:p1 ORDER BY date DESC LIMIT 1 ";
        $query = $this->db->prepare($sql);
        $query->execute(array(
            ':p1' => $p1,
            ':p2' => $p2
        ));
        return $query->fetchAll();

    }

    function Num2Name($num){

        $query = $this->db->prepare("SELECT username FROM user WHERE id = :num");
        $query->execute(array(
            ':num' => $num
        ));
        $result = $query->fetch();
        return $result['username'];

    }

    function lastTimestamp(){

        $query = $this->db->prepare("SELECT date FROM chatmessage ORDER BY date DESC LIMIT 1");
        $query->execute();
        $result =  $query->fetch();
        return $result['date'];

    }


}