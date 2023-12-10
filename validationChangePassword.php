<?php
session_start();
require "connection.php";

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$email = sanitize($_POST['email']);
	$oldPassword = sanitize($_POST['oldPassword']);
	$password = sanitize($_POST['password']);
	$confirmPassword =sanitize ($_POST['confirmPassword']);

	$flag = true;

	// email------------------------
	if (empty($email)) {
		$_SESSION['emailErr'] = "*Email is empty";
		$flag = false;
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['emailErr'] = "*Invalid email format";
		$flag = false;
	} else {
		$_SESSION['emailErr'] = "";
		$_SESSION['email'] = $email;
	}

	// OLD Password
	if (empty($oldPassword)) {
		$_SESSION['oldPasswordErr'] = "*Old password is Empty";
		$flag = false;

	} else {
		$_SESSION['oldPasswordErr'] = "";
		$_SESSION['oldPassword'] = $oldPassword;
	}

	// password and confirm password------------------------

	if (empty($password)) {
		$_SESSION['passwordErr'] = "*Password is empty";
		$flag = false;
		$password = "";

	} elseif (empty($confirmPassword)) {
		$_SESSION['confirmPasswordErr'] = "*Confirm Password is empty";
		$flag = false;
		$confirmPassword = "";

	} elseif ($password !== $confirmPassword) {
		$_SESSION['passwordErr'] = "*Passwords do not match";
		$_SESSION['confirmPasswordErr'] = "*Passwords do not match";
		$flag = false;
		$password = "";
		$confirmPassword = "";

	} else {
		$_SESSION['passwordErr'] = "";
		$_SESSION['confirmPasswordErr'] = "";
		$_SESSION['password'] = $password;
	}






	if ($flag) {
        $_SESSION['track'] = "Ok";
        $con = Connection();

        $sql = "UPDATE patient SET password = ? WHERE email = ?";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ss', $password, $email);
            $stmt->execute();
            $stmt->close();

            header("Location: login.php");
        } else {
            die("Error in statement preparation: " . $con->error);
        }
    } else {
        header("Location: changePassword.php");
    }
}

?>