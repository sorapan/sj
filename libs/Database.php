<?php

class Database extends PDO{


    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){

        parent::__construct($DB_TYPE .":host=". $DB_HOST .";dbname=". $DB_NAME .";charset=utf8", $DB_USER , $DB_PASS);

//        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }


    public function insert($table,$data){


    }

    public function update($table,$data,$where){


    }


}