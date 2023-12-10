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


	$firstName =sanitize ($_POST['firstName']);
	$lastName = sanitize($_POST['lastName']);
	$dob = $_POST['dob'];
	$email =sanitize ($_POST['email']);
	$phoneNumber = $_POST['phoneNumber'];
	$gender = $_POST['gender'];
	$bloodGroup =$_POST['bloodGroup'];
	$password = sanitize($_POST['password']);
	$confirmPassword = sanitize($_POST['confirmPassword']);
	$securityQuestion =sanitize ($_POST['securityQuestion']);
	
	

	$flag = true;


	// first name------------------------
	if (empty($firstName)) {
		$_SESSION['firstNameErr'] = "*First Name Empty";
		$flag = false;
	} elseif (!preg_match("/^[a-zA-Z\s.]*$/", $firstName)) {
		$_SESSION['firstNameErr'] = "*Only letters allowed";
		$flag = false;
	} else {
		$_SESSION['firstNameErr'] = "";
		$_SESSION['firstName'] = $firstName;
	}

	// last name -------------------

	if (empty($lastName)) {
		$_SESSION['lastNameErr'] = "*Last Name Empty";
		$flag = false;
	} elseif (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
		$_SESSION['lastNameErr'] = "*Only letters allowed";
		$flag = false;
	} else {
		$_SESSION['lastNameErr'] = "";
		$_SESSION['lastName'] = $lastName;
	}


	// date of birth -------------------------------------

	if (empty($dob)) {
		$_SESSION['dobErr'] = "*Date of Birth is empty";
		$flag = false;
	} else {
		$dobTimestamp = strtotime($dob);

		if ($dobTimestamp === false) {
			$_SESSION['dobErr'] = "*Invalid date format";
			$flag = false;
			$dob = ""; // Clear the date of birth field
		} else {
			$currentDate = strtotime(date("Y-m-d"));
			$minDate = strtotime("-100 years", $currentDate);
			$maxDate = strtotime("-1 day", $currentDate);

			if ($dobTimestamp < $minDate || $dobTimestamp > $maxDate) {
				$_SESSION['dobErr'] = " *Date of Birth should be between 1 and 100 years ago";
				$flag = false;
				$dob = ""; // Clear the date of birth field
			} else {
				$_SESSION['dobErr'] = "";
				$_SESSION['dob'] = $dob;
			}
		}
	}

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

	// Phone----------------------
	if (empty($phoneNumber)) {
		$_SESSION['phoneNumberErr'] = "";
		$_SESSION['phoneNumberErr'] = "*Phone Number Empty";
		$flag = false;

	} elseif (!is_numeric($phoneNumber)) {
		$_SESSION['phoneNumberErr'] = "*Please enter only numeric digits";
		$flag = false;
	} else {
		$_SESSION['phoneNumberErr'] = "";
		$_SESSION['phoneNumber'] = $phoneNumber;


	}
	// Gender -------------
	if (empty($gender)) {
		$_SESSION['genderErr'] = "";
		$_SESSION['genderErr'] = "*Please select Gender";
		$flag = false;

	} else {
		$_SESSION['genderErr'] = "";
		$_SESSION['gender'] = $gender;


	}
	// Blood Group -------------
	if (empty($bloodGroup)) {
		$_SESSION['bloodGroupErr'] = "";
		$_SESSION['bloodGroupErr'] = "*Please select Blood Group";
		$flag = false;

	} else {
		$_SESSION['bloodGroupErr'] = "";
		$_SESSION['bloodGroup'] = $bloodGroup;


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
		

	} else {
		$_SESSION['passwordErr'] = "";
		$_SESSION['confirmPasswordErr'] = "";
		$_SESSION['password'] = $password;
	}

	//  security Question -------------
	if (empty($securityQuestion)) {
		$_SESSION['securityQuestionErr'] = "";
		$_SESSION['securityQuestionErr'] = "*Please Enter Security Question";
		$flag = false;

	} else {
		$_SESSION['securityQuestionErr'] = "";
		$_SESSION['securityQuestion'] = $securityQuestion;


	}




	// // ----------------------
	// if (empty($email)) {
	// 	$_SESSION['email'] = 'Email is Empty';
	// 	$flag = false;	
	// }
	// else {
	// 	$_SESSION['emailErr'] = "";
	// 	$_SESSION['email'] = $email;	
	// }
	// // ----------------------
	// if (empty($phoneNumber)) {
	// 	$_SESSION['phoneNumber'] = 'Phone Number is Empty';
	// 	$flag = false;	
	// }
	// else {
	// 	$_SESSION['phoneNumberErr'] = "";
	// 	$_SESSION['phoneNumber'] = $phoneNumber;	
	// }
	// // ----------------------
	// if (empty($gender)) {
	// 	$_SESSION['gender'] = 'Gender is Empty';
	// 	$flag = false;	
	// }
	// else {
	// 	$_SESSION['genderErr'] = "";
	// 	$_SESSION['gender'] = $gender;	
	// }




	if ($flag) {
		$_SESSION['track'] = "Ok";


		$user = ['', 'firstName' => $firstName,'lastName' => $lastName, 'dob' => $dob, 'email' => $email, 'phoneNumber' => $phoneNumber,'gender' => $gender,'bloodGroup' => $bloodGroup,'password' => $password, 'confirmPassword' => $confirmPassword , 'securityQuestion' => $securityQuestion ];

		$con = Connection();
		// $sql = "insert into patient values('','{$user['firstName']}','{$user['lastName']}','{$user['dob']}','{$user['email']}', '{$user['phoneNumber']}',  '{$user['gender']}', '{$user['bloodGroup']}','{$user['password']}','{$user['securityQuestion']}')";

		$sql = "insert into patient(id, firstname, lastname, dob, email, phoneNumber, gender, bloodGroup, password, securityQuestion )values(?,?,?,?,?,?,?,?,?,?)";
		
		// $status = mysqli_query($con, $sql);
		$stmt = mysqli_stmt_init($con);
		
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			echo "Statement Failed";
		}
		else{
			mysqli_stmt_bind_param($stmt,"isssssssss", $user[''], $user['firstName'], $user['lastName'], $user['dob'], $user['email'], $user['phoneNumber'],$user['gender'], $user['bloodGroup'], $user['password'], $user['securityQuestion']);
			$status = mysqli_stmt_execute($stmt);
		}
		
		
		if ($status) {
			// move_uploaded_file($_FILES["image"]["tmp_name"],"upload/".$_FILES["image"]["name"]);
			// $_SESSION['status'] = "Image store successfully";
			
			header('location:login.php');
		} else {
			echo " Something went wrong, try again";
		}



	} else {
		
		// $_SESSION['status'] = "Image not inserted";
		header("Location: registration.php");
	}
}

?>