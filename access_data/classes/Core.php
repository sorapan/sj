<?php

class Core {

    protected $db;

    public function __construct(){

        $this->db = new PDO("mysql:host=localhost;dbname=pi;charset=utf8","root","1234");

    }

    protected function query($sql_query){

        return $this->db->query($sql_query);

    }

}