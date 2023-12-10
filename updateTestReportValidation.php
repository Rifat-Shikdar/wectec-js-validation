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

	
	$email =sanitize ($_SESSION['email']);
	$testName =$_POST['testName'];
	$testDate = $_POST['testDate'];
	$medicalHistory =$_POST['medicalHistory'];
	
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



	// if ($flag) {
	// 	$_SESSION['track'] = "Ok";


	// 	$con = Connection();
    
    //         $sql = "update testreport set email = '$email',id = 'id', testName = '$testName', testDate = '$testDate', medicalHistory = '$medicalHistory' Where id ='$id'";
            
    //         mysqli_query($con, $sql);
		
		
		
	// 		header('location:viewTestReport.php');
		


	// } else {
       
	// 	header("Location: updateTestReport.php");
	// }

	if ($flag) {
        $_SESSION['track'] = "Ok";

        $con = Connection();

        $sql = "UPDATE testreport SET email = ?, testName = ?, testDate = ?, medicalHistory = ? WHERE id = ?";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            // Assuming you have an 'id' parameter to uniquely identify the record
            $id = $_POST['id'];
            $stmt->bind_param('ssssi', $email, $testName, $testDate, $medicalHistory, $id);
            $stmt->execute();
            $stmt->close();

            header('location:viewTestReport.php');
        } else {
            die("Error in statement preparation: " . $con->error);
        }
    } else {
        header("Location: updateTestReport.php");
    }
}

?>