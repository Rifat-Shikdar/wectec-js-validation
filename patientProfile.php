<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="patientProfile.css">

</head>

<body>
    <div class="nav">
        <h1 class="heading">Hospital Management System </h1>
        <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Index</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn hover"><a class="btn-link" href="logOut.php">Logout</a></button>
    </div>
    <br>
    <?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }



    ?>

    <table>
        <header>
            <h2>Welcome to Patient Profile</h2>




        </header>
        <main id="main">
            <div class="block-1 block">
                <p>For View Account &nbsp;&nbsp;<br><br>
                    <button class="btn hover">
                        <a class="btn-link" href="viewAccount.php">View Account</a>
                    </button>
                </p>
            </div>

            <div class="block-2 block">
                <p> For Change your Password &nbsp;&nbsp;&nbsp;&nbsp;<br><br>
                    <button class="btn hover">
                        <a class="btn-link" href="changePassword.php">Change Password</a>
                    </button>
                </p>
            </div>


            <div class="block-2 block">
                <p>Update your Information &nbsp;<br><br>
                    <button class="btn hover">
                        <a class="btn-link" href="accountUpdate.php">Modify You Information</a>
                    </button><br>
                </p>
            </div>

            <div class="block-2 block">
                <p>Test Reports &nbsp;<br> <br>
                    <button class="btn hover">
                        <a class="btn-link" href="report.php">Reports</a>
                    </button><br>
                </p>
            </div>
        </main>

        <footer>

        </footer>
    </table>





</body>

<footer id="footer">
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>