<?php

class index_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetchMessage(){

        $count_array = 0;
        $data = array();

        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC Limit 5 Offset 0");
        $query->execute();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $data["date"][$count_array] = date('d/m/Y - h:i A',(int)$row['date']);
            $data["last_update"][$count_array] = date('d/m/Y - h:i A',(int)$row['last_update']);
            $data["msg"][$count_array] = $row['note'];
            $data["hdr"][$count_array] = $row['header'];
            $data["id"][$count_array] = $row['id'];
            $data["topicID"][$count_array] = $row['topicID'];
            $count_array++;

        }

        $data['now_time'] = $this->TimeStamp();
        $data['firsttimeFetch'] = 0;
        return json_encode($data);

    }

    function fetchMessage_Last(){

        $data = array();

        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
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

        $count_array = 0;
        $data = array();
        $query = $this->db->prepare("Select * From `post` Order By `last_update` DESC Limit 5 Offset $off");
        $query->execute();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $data["date"][$count_array] = date('d/m/Y - h:i A',(int)$row['date']);
            $data["last_update"][$count_array] = date('d/m/Y - h:i A',(int)$row['last_update']);
            $data["msg"][$count_array] = $row['note'];
            $data["hdr"][$count_array] = $row['header'];
            $data["id"][$count_array] = $row['id'];
            $data["topicID"][$count_array] = $row['topicID'];
            $count_array++;

        }
        return json_encode($data);

    }

    function TimeStamp(){

        $query = $this->db->prepare("Select date From post Order By date DESC");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['date'];

    }

} 