<?php
$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "project";

function Connection()
{
    global $dbhost;
    global $dbuser;
    global $dbpass;
    global $dbname;

    return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}


?>