<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="report.css">
</head>
<body>
<?php
    session_start();

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
    <h2>Reports</h2><br>
    
    <main id="main">
            <div class="block-1 block">
                <p>Add Test Report &nbsp;&nbsp;<br><br>
                    <button class="btn hover">
                    <a class="btn-link" class="btn hover" href="testReport.php">Test Reports</a>
                    </button>
                </p>
            </div>

            <div class="block-2 block">
                <p> View Test Reports &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                    <button class="btn hover">
                    <a class="btn-link" href="viewTestReport.php">View Test Reports</a>
                    </button>
                </p>
            </div>


            <div class="block-2 block">
                <p>Update your Information &nbsp;<br><br>
                    <button class="btn hover">
                    <a class="btn-link" href="viewTestReportAllinfo.php">View Test Reports All Info</a>
                    </button><br>
                </p>
            </div>

            <div class="block-2 block">
                <p>Home &nbsp;<br> <br>
                    <button class="btn hover">
                    <a class="btn-link" href="patientProfile.php">Home</a>
                    </button>
                    
                </p>
            </div>
        </main>

</body>

<footer id="footer">
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>
</html>