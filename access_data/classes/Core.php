<?php

class Core {


    static private function db(){

        return new PDO("mysql:host=127.0.0.1;dbname=pi;charset=utf8","root","1234");

    }

    static protected function query($sql_query){

        return self::db()->query($sql_query);

    }

}