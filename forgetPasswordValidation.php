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

	$securityQuestion =sanitize ($_POST['securityQuestion']);
	
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
    
    //  security Question -------------
    if (empty($securityQuestion)) {
       
        $_SESSION['securityQuestionErr'] = "*Please Enter Security Question";
        $flag = false;

    }

        
    else {
        
        $_SESSION['securityQuestionErr'] = "";
        $_SESSION['securityQuestion'] = $securityQuestion;


    }
	

	

	if ($flag) {
		$_SESSION['track'] = "Ok";

		// $con = Connection();
		// $sql = "select * from patient where email='{$email}' and securityQuestion ='{$securityQuestion}'";
		// $result = mysqli_query($con, $sql);
		// $count = mysqli_num_rows($result);

		// if ($count == 1) {

		// 	header("Location: updateForgetPassword.php");

		// } else {
		// 	header("Location: forgetPassword.php");
		// 	$_SESSION['securityQuestionErr'] = "<br>*Invalid ";
		// }

	
			$con = Connection();
			
			$stmt = $con->prepare("SELECT * from patient where email= ? AND securityQuestion = ?");
			
	
			if ($stmt) {
				$stmt->bind_param('ss', $email, $securityQuestion);
				$stmt->execute();
				$stmt->store_result();
				$count = $stmt->num_rows;
				$stmt->close();
	
				if ($count == 1) {
					header("Location: updateForgetPassword.php");
				} else {
					header("Location: forgetPassword.php");
					$_SESSION['securityQuestionErr'] = "<br>*Invalid !! Please enter correct Email or Security Question ";
				}
			} else {
				die("Error in statement preparation: " . $con->error);
			}
		} else {
			header("Location: forgetPassword.php");
		}
}

?>