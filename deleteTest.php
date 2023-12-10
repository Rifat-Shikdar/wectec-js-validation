<?php
session_start();
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Products</title>
</head>

<body>
<h1>Hospital Management System </h1>
<a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="">Index</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="">Contact Us</a><br>
    

    <form action="deleteTestValidation.php" method="post" novalidate>

        <table border=1>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Id</th>
                    <th>Test Name</th>
                    <th>Test Date</th>
                    <th>Medical Report</th>
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
                $sql = "Select * from testreport";
                $status = mysqli_query($con, $sql);


                if ($status) {
                    while ($row = mysqli_fetch_assoc($status)) {

                        echo '
    
     <tr>
     <td>' . $row['email'] . '</td>
     
     <td>' . $row['testName'] . '</td>
     <td>' . $row['testDate'] . '</td>
     <td>' . $row['medicalHistory'] . '</td>
     
    
     

</tr>';
                    }
                }

                ?>

            </tbody>
        </table>
        <p>Enter your email for delete Test</p>

        <b> Email:</b> <input type="email" name="email" id="email"
            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
        <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Delete"><br><br>
        <br><br><a href="report.php">Back</a><br>
        <a href=""></a>


</body>

<footer>
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>