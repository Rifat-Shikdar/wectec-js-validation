<?php
session_start();

echo "Registration Successful !!!";
echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : "N/A";
$_SESSION['firstName'] = $firstName;


echo "<hr>";





?>