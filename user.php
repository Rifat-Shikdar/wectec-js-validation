<?php 

    function login($email, $password){

        if($email === "admin" and $password === "admin"){
            return true;
        }
        return false;
    }

?>