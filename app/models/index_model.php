<?php

class index_model extends Model{

    function __construct() {

        parent::__construct();

    }

    function fetchMessage(){

        $count_array = 0;
        $data = array();

        $query = $this->db->prepare("Select * From post Order By date DESC Limit 5 Offset 0");
        $query->execute();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $data["date"][$count_array] = date('d/m/Y - h:i A',(int)$row['date']);
            $data["msg"][$count_array] = $row['content'];
            $data["hdr"][$count_array] = $row['header'];
            $count_array++;

        }

        $data['now_time'] = $this->TimeStamp();
        $data['firsttimeFetch'] = 0;

        return json_encode($data);

    }

    function fetchMessage_Last(){

        $data = array();

        $query = $this->db->prepare("Select * From post Order By date DESC");
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $data["date"]= date('d/m/Y - h:i A',(int)$row['date']);
        $data["msg"] = $row['content'];
        $data["hdr"] = $row['header'];
        $data['now_time'] = $this->Timestamp();
        $data['firsttimeFetch'] = 0;

        return json_encode($data);

    }

    function Loadmore($off){

        $count_array = 0;
        $data = array();
        $query = $this->db->prepare("Select * From post Order By date DESC Limit 5 Offset $off");
        $query->execute();
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $data["date"][$count_array] = date('d/m/Y - h:i A',(int)$row['date']);
            $data["msg"][$count_array] = $row['content'];
            $data["hdr"][$count_array] = $row['header'];
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