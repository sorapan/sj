<?php

class Core {

    static protected function query($sql_query){

        $db = new PDO("mysql:host=localhost;dbname=pi;charset=utf8","root","1234");
        return $db->query($sql_query);

    }

}