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
    $newPassword = sanitize($_POST['newPassword']);
    $confirmNewPassword = sanitize($_POST['confirmNewPassword']);


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


    // password and confirm password------------------------

    if (empty($newPassword)) {
        $_SESSION['newPasswordErr'] = "*Password is empty";
        $flag = false;
        $newPassword = "";

    } elseif (empty($confirmNewPassword)) {
        $_SESSION['confirmNewPasswordErr'] = "*Confirm Password is empty";
        $flag = false;
        $confirmNewPassword = "";

    } elseif ($newPassword !== $confirmNewPassword) {
        $_SESSION['newPasswordErr'] = "*Passwords do not match";
        $_SESSION['confirmNewPasswordErr'] = "*Passwords do not match";
        $flag = false;
        $newPassword = "";
        $confirmNewPassword = "";

    } else {
        $_SESSION['newPasswordErr'] = "";
        $_SESSION['confirmNewPasswordErr'] = "";
        $_SESSION['newPassword'] = $newPassword;
    }








    // if ($flag) {
    //     $_SESSION['track'] = "Ok";
    //     $con = Connection();

    //     $sql = "update Patient set password = '$newPassword' Where email ='$email'";
    //     mysqli_query($con, $sql);


    //    header("Location: login.php");
    //    $_SESSION['successMessage'] = "Successfully Changed !! ";
    //     }
    //     else {
    //        header("Location: updateForgetPassword.php");
           
    //    }

    if ($flag) {
        $_SESSION['track'] = "Ok";
        $con = Connection();

        $sql = "UPDATE Patient SET password = ? WHERE email = ?";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ss', $newPassword, $email);
            $stmt->execute();
            $stmt->close();

            header("Location: login.php");
            $_SESSION['successMessage'] = "Successfully Changed !! ";
        } else {
            die("Error in statement preparation: " . $con->error);
        }
    } else {
        header("Location: updateForgetPassword.php");
    }
}

?>