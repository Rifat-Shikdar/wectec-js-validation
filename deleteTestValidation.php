<?php
session_start();
require "connection.php";

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = ($_POST['email']);
        $flag = true;

        if (empty($email)) {
            $_SESSION['emailErr'] = "Email is Empty";
            $_SESSION['email'] = "";
            $flag = false;
        } else {
            $_SESSION['emailErr'] = "";
            $_SESSION['email'] = $email;

        }
        
        if ($flag) {
            $_SESSION['track'] = "Ok";

            $con = Connection();

            $sql = "DELETE FROM testreport WHERE email = ?";
            $stmt = $con->prepare($sql);
            
            if ($stmt) {
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $stmt->close();
                header('location: deleteTestDone.php');
            } else {
                die("Error in statement preparation: " . $con->error);
            }
            
        } else {
            header('location: deleteTest.php');
        }

    }
}
?>