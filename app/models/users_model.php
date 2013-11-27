<?php

class users_model extends Model{

    function __construct(){

        parent::__construct();

    }

    function index(){

        $query = $this->db->prepare("SELECT * FROM user");
        $query->execute();
        $ans = $query->fetchAll();

        return $ans;

    }

} 