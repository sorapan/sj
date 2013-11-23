<?php

class logout extends Controller{

    function logout(){

        Session::destroy();
        header("location: ../login");

    }

} 