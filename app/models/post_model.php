<?php

class post_model extends Model{

    function __construct() {

        parent::__construct();

    }


    function PushData($data){

        if(is_array($data)){

            $query = $this->db->prepare(' INSERT INTO post (`user_id`,`header`,`content`,`date`) VALUES ( :user_id, :header, :content, :date) ');
            $query->execute(array(
                ':user_id' => 1,
                ':header' => $data['header'],
                ':content' => $data['content'],
                ':date' => 'UNIX_TIMESTAMP()'
            ));

        }else{

            echo 'something is wrong';

        }

    }

} 