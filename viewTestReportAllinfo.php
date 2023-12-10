<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Test Report</title>
    <link rel="stylesheet" href="viewTestReportAllinfo.css">
</head>

<body>
<?php
    

    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();}

   ?>
<div class="nav">
        <h1 class="heading">Hospital Management System </h1>
        <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Index</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn hover"><a class="btn-link" href="logOut.php">Logout</a></button>
    </div>

    <table>
        <thead>
            <tr>
                <h2>View Test Report</h2>
                
            </tr>
        </thead>
        <tbody>


            <?php


            function sanitize($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $email = sanitize($_SESSION['email']);

            $con = Connection();
            $sql = "Select email, testName, testDate,medicalHistory from testreport Where email ='$email'";
            $status = mysqli_query($con, $sql);


            if ($status) {
                while ($row = mysqli_fetch_assoc($status)) {

                    echo '
        <tr>
        <td>
                email      : <b>' . $row['email'] . ' </b><br><br>
                testName    :<b>' . $row['testName'] . '</b><br><br>
                testDate    :<b>' . $row['testDate'] . '</b><br><br>
                medicalHistory :<b>' . $row['medicalHistory'] . '</b><br><br>
            
      
    </tr>';
                }
            }

            
            $con = Connection();
            $sql = "Select id, firstname,lastname,dob,phoneNumber,gender, bloodGroup from patient Where email ='$email'";
            $status = mysqli_query($con, $sql);


            if ($status) {
                while ($row = mysqli_fetch_assoc($status)) {

                    echo '
               <tr>
               <td>
               id      : <b>' . $row['id'] . ' </b><br><br>
               firstName    :<b>' . $row['firstname'] . '</b><br><br>
               lastName    :<b>' . $row['lastname'] . '</b><br><br>
               dob    :<b>' . $row['dob'] . '</b><br><br>
               phoneNumber       :<b>' . $row['phoneNumber'] . '</b><br><br>
               gender    :<b>' . $row['gender'] . '</b><br><br>
               
               bloodGroup    :<b>' . $row['bloodGroup'] . '</b><br><br>
               
               
              
               
       
       </tr>';
                }
            }



            ?>

        </tbody>
    </table>
    
    <!-- <button><a href="accountUpdate.php">Modify You Information</a></button><br> -->
    <br><button class="btn hover"><a class="btn-link" href="report.php">Back</a></button><br>


</body>
<hr>
<footer id="footer" >
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>