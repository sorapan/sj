<?php

class index_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetchMessage(){

        $data = array();

        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC Limit 5 Offset 0");
        $query->execute();
        $row = $query->fetchAll();

        foreach($row as $k=>$v){

            $data["date"][$k] = date('d/m/Y - h:i A',(int)$v['date']);
            $data["last_update"][$k] = date('d/m/Y - h:i A',(int)$v['last_update']);
            $data["msg"][$k] = $v['note'];
            $data["hdr"][$k] = $v['header'];
            $data["user"][$k] = $this->CheckUserFromID($v['user_id']);
            $data["id"][$k] = $v['id'];
            $data["topicID"][$k] = $v['topicID'];
            $data["status"][$k] = $v['status'];
            $data["img"][$k] = $this->GetImg($v['topicID'],$v['status']);

        }

        $data['now_time'] = $this->TimeStamp();
        $data['firsttimeFetch'] = 0;
        return json_encode($data);

    }

    function fetchMessage_Last(){

        $data = array();

        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC");
        $query->execute();
        $row = $query->fetchAll();
        $data["date"]= date('d/m/Y - h:i A',(int)$row['date']);
        $data["last_update"] = date('d/m/Y - h:i A',(int)$row['last_update']);
        $data["msg"] = $row['content'];
        $data["hdr"] = $row['header'];
        $data['now_time'] = $this->Timestamp();
        $data['firsttimeFetch'] = 0;
        $data["id"] = $row['id'];
        $data["topicID"] = $row['topicID'];

        return json_encode($data);

    }

    function Loadmore($off){


        $data = array();
        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC Limit 5 Offset $off");
        $query->execute();
        $row = $query->fetchAll();

        foreach($row as $k=>$v){

            $data["date"][$k] = date('d/m/Y - h:i A',(int)$v['date']);
            $data["last_update"][$k] = date('d/m/Y - h:i A',(int)$v['last_update']);
            $data["msg"][$k] = $v['note'];
            $data["hdr"][$k] = $v['header'];
            $data["id"][$k] = $v['id'];
            $data["topicID"][$k] = $v['topicID'];

        }
        return json_encode($data);

    }

    function TimeStamp(){

        $query = $this->db->prepare("Select date From post Order By date DESC");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['date'];

    }

    function CheckUserFromID($id){

        $query = $this->db->prepare("SELECT username,class FROM user WHERE id = :id");
        $query->execute(array(
            ':id' => $id
        ));
        $result = $query->fetchAll();
        return $result[0]['username'];

    }

    function GetImg($topicid,$status){

        $query = $this->db->prepare("SELECT img_name FROM img WHERE topic_id = :topicid AND staus = :status AND type = 'img' LIMIT 4");
        $query->execute(array(
            ':topicid' => $topicid,
            ':status' => $status
        ));
        $result = $query->fetchAll();
        return $result;

    }

} 