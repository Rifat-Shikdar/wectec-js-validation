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


	$email = sanitize($_SESSION['email']);
	$testName = $_POST['testName'];
	$testDate = $_POST['testDate'];
	$medicalHistory = $_POST['medicalHistory'];

	$flag = true;


	// test Name -------------
	if (empty($testName)) {
		$_SESSION['testNameErr'] = "";
		$_SESSION['testNameErr'] = "*Please select Test Name";
		$flag = false;

	} else {
		$_SESSION['testNameErr'] = "";
		$_SESSION['testName'] = $testName;


	}
	// test Date -------------
	if (empty($testDate)) {
		$_SESSION['testDateErr'] = "";
		$_SESSION['testDateErr'] = "*Please Enter Test Date";
		$flag = false;

	} else {
		$_SESSION['testDateErr'] = "";
		$_SESSION['testDate'] = $testDate;


	}



	// Medical History  -------------
	if (empty($medicalHistory)) {
		$_SESSION['medicalHistoryErr'] = "";
		$_SESSION['medicalHistoryErr'] = "*Please Enter Your Medical History";
		$flag = false;

	} else {
		$_SESSION['medicalHistoryErr'] = "";
		$_SESSION['medicalHistory'] = $medicalHistory;


	}





	if ($flag) {
		$_SESSION['track'] = "Ok";


		// $test = ['email' => $email, 'testName' => $testName,'testDate' => $testDate,  'medicalHistory' => $medicalHistory];

		// $con = Connection();
		// $sql = "insert into testreport values('{$test['email']}','{$test['testName']}','{$test['testDate']}','{$test['medicalHistory']}')";

		// $status = mysqli_query($con, $sql);


		// if ($status) {

		// 	header('location:viewTestReport.php');
		// } else {

		// 	echo " Something went wrong, try again";
		// }

		$con = Connection();
		$sql = "INSERT INTO testreport (email, testName, testDate, medicalHistory) VALUES (?, ?, ?, ?)";
		$stmt = $con->prepare($sql);

		if ($stmt) {
			$stmt->bind_param('ssss', $email, $testName, $testDate, $medicalHistory);
			$stmt->execute();
			$stmt->close();

			header('location:viewTestReport.php');
		} else {
			die("Error in statement preparation: " . $con->error);
		}
	} else {
		header('location:testReport.php');
		// echo "not okay";
	}
}

?>