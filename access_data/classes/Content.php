<?php


class Content extends Core{


    public function fetchReply(){

        $count_array = 0;
        $data = array();
        $query = $this->query("Select * From post Order By date DESC Limit 5 Offset 0");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $data["date"][$count_array] = date('d/m/Y - h:i A',(int)$row['date']);
            $data["msg"][$count_array] = $row['content'];
            $data["hdr"][$count_array] = $row['header'];
            $count_array++;

        }

        $data['now_time'] = $this->Timestamp();
        $data['firsttimeFetch'] = 0;
        return json_encode($data);

    }

    public function fetchReplyLastest(){

        $data = array();
        $query = $this->query("Select * From post Order By date DESC");
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $data["date"]= date('d/m/Y - h:i A',(int)$row['date']);
        $data["msg"] = $row['content'];
        $data["hdr"] = $row['header'];
        $data['now_time'] = $this->Timestamp();
        $data['firsttimeFetch'] = 0;

        return json_encode($data);

    }


    public function Timestamp(){

        $queries = $this->query("Select date From post Order By date DESC");
        $row = $queries->fetch(PDO::FETCH_ASSOC);

        return $row['date'];

    }


    public function query($sqlQuery){

        $result = new Core();
        return $result->query($sqlQuery);

    }

}