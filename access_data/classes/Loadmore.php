<?php

class Loadmore extends Core{

    static public function fetchLoadmore($off){

        $count_array = 0;
        $data = array();
        $query = parent::query("Select * From post Order By date DESC Limit 5 Offset $off");
        while($row = $query->fetch(PDO::FETCH_ASSOC)){

            $data["date"][$count_array] = date('d/m/Y - h:i A',(int)$row['date']);
            $data["msg"][$count_array] = $row['content'];
            $data["hdr"][$count_array] = $row['header'];
            $count_array++;

        }

        return json_encode($data);

    }

}