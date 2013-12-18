<?php

class post_model extends Model{

    function __construct() {

        parent::__construct();

    }


    function PushData($data){

        if(is_array($data)){

            $query = $this->db->prepare(" INSERT INTO post (`user_id`, `header`, `content`, `date`)".
                "VALUES (:userid, :header, :content, :date) ");
            $query->execute(array(
                ':userid' => "1",
                ':header' => $data['header'],
                ':content' => $data['content'],
                ':date' =>  time()
            ));

//            use for check error
//            echo "\nPDO::errorInfo():\n";
//            print_r($query->errorInfo());

        }else{

            echo 'something is wrong';

        }

    }

    function LastTopicId(){

        $qry = $this->db->prepare("SELECT id FROM post ORDER BY date LIMIT 1");
        $qry->execute();
        return $qry->fetch();


    }

} 