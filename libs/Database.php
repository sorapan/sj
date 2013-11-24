<?php

class Database extends PDO{


    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){

        parent::__construct($DB_TYPE .":host=". $DB_HOST .";dbname=". $DB_NAME .";charset=utf8", $DB_USER , $DB_PASS);

//        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

    public function select($sql, $array = array(), $fetchmode = PDO::FETCH_ASSOC){

        $sth = $this->prepare($sql);
        foreach($array as $key=>$value){

            $sth->bindValue("$key", $value);

        }

        $sth->execute();
        return $sth->fetchAll($fetchmode);

    }


    public function insert($table,$data){

        ksort($data);

        $fieldnames = implode("` , `" , array_keys($data));
        $fieldvalues = ":" . implode(", :" , array_keys($data));

        $sth = $this->prepare(" INSERT INTO $table (`$fieldnames`) VALUES ($fieldvalues)");

        foreach($data as $key=>$value){

            $sth->bindValue(":$key",$value);

        }

        $sth->execute();

    }

    public function update($table,$data,$where){

        ksort($data);

        $fieldDetails = null;
        foreach($data as $key => $value){

            $fieldDetails .= "`$key`=:$key,";

        }
        $fieldDetails = rtrim($fieldDetails, ",");

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach($data as $key=>$value){

            $sth->bindValue(":$key", $value);

        }

        $sth->execute();
    }

    public function delete($table, $where, $limit = 1){

        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");

    }


}