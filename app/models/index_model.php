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
            $data["verify"][$k] = $v['verify'];
            $data["detail"][$k] = $v['detail'];

        }

        $data['now_time'] = $this->TimeStamp();
        $data['firsttimeFetch'] = 0;
        return json_encode($data);
//        echo "\nPDO::errorInfo():\n";
//        print_r($query->errorInfo());
//        echo $data['carimg'][0][0][0];

    }


    function fetchMessage_Last(){

        $data = array();
        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC");
        $query->execute();
        $row = $query->fetchAll();
        $data["date"]= date('d/m/Y - h:i A',(int)$row['date']);
        $data["last_update"] = date('d/m/Y - h:i A',(int)$row[0]['last_update']);
        $data["msg"] = $row[0]['note'];
        $data["hdr"] = $row[0]['header'];
        $data['now_time'] = $this->Timestamp();
        $data['firsttimeFetch'] = 0;
        $data["id"] = $row[0]['id'];
        $data["topicID"] = $row[0]['topicID'];
        $data["status"] = $row[0]['status'];
        $data["verify"] = $row[0]['verify'];
        $data["detail"] = $row[0]['detail'];

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
            $data["user"][$k] = $this->CheckUserFromID($v['user_id']);
            $data["id"][$k] = $v['id'];
            $data["topicID"][$k] = $v['topicID'];
            $data["status"][$k] = $v['status'];
            $data["verify"][$k] = $v['verify'];
            $data["detail"][$k] = $v['detail'];

        }
        return json_encode($data);

    }

    function TimeStamp(){

        $query = $this->db->prepare("Select last_update From post Order By date DESC");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['last_update'];

    }

    function CheckUserFromID($id){

        $query = $this->db->prepare("SELECT username,class FROM user WHERE id = :id");
        $query->execute(array(
            ':id' => $id
        ));
        $result = $query->fetchAll();
        return $result[0]['username'];

    }

    function getCarImg($topicid,$status){

        $query = $this->db->prepare("SELECT img_name FROM img WHERE topic_id = :topicid AND status = :status AND type = 'img' LIMIT 4");
        $query->execute(array(
            ':topicid' => $topicid,
            ':status' => $status
        ));
        $result = $query->fetchAll();
        return $result;

    }

} 