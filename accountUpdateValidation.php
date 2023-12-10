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

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$id = sanitize($_POST['id']);
	$firstName = sanitize($_POST['firstName']);
	$lastName = sanitize($_POST['lastName']);
	$dob = $_POST['dob'];
	$email = sanitize($_POST['email']);
	$phoneNumber = $_POST['phoneNumber'];
	$gender = $_POST['gender'];
	$bloodGroup = $_POST['bloodGroup'];
	$securityQuestion = sanitize($_POST['securityQuestion']);

	$flag = true;

	// ID----------------------
	if (empty($id)) {
		$_SESSION['idErr'] = "";
		$_SESSION['idErr'] = "*id Empty";
		$flag = false;

	} elseif (!is_numeric($id)) {
		$_SESSION['idErr'] = "*Please enter only numeric digits";
		$flag = false;
	} else {
		$_SESSION['idErr'] = "";
		$_SESSION['id'] = $id;


	}

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


	//  security Question -------------
	if (empty($securityQuestion)) {
		$_SESSION['securityQuestionErr'] = "";
		$_SESSION['securityQuestionErr'] = "*Please Enter Security Question";
		$flag = false;

	} else {
		$_SESSION['securityQuestionErr'] = "";
		$_SESSION['securityQuestion'] = $securityQuestion;


	}




	if ($flag) {
		$_SESSION['track'] = "Ok";


		$con = Connection();

		// $sql = "update patient set firstname = '$firstName', lastname = '$lastName', dob = '$dob', email = '$email', phoneNumber = '$phoneNumber',gender ='$gender', bloodGroup = '$bloodGroup',securityQuestion ='$securityQuestion'  Where id ='$id'";

		$stmt = $con->prepare("update patient set firstname = ?, lastname = ?, dob = ?,email = ?,phoneNumber = ?, gender = ?,bloodGroup = ?,securityQuestion = ? Where id =?");
		if ($stmt) {
			$stmt->bind_param('ssssssssi', $firstName, $lastName, $dob, $email, $phoneNumber, $gender, $bloodGroup, $securityQuestion, $id);
			$stmt->execute();
		} else {
			die("Error in statement preparation: " . $con->error);
		}


		// mysqli_query($con, $sql);
		$stmt = mysqli_stmt_init($con);



		header('location:viewAccount.php');



	} else {

		header("Location: accountUpdate.php");
	}
}

?>