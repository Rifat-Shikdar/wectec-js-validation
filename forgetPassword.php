<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgetPassword.css">
    <script src="forgetPassword.js"></script>
    <title>Forget Password</title>
</head>
 
<body>

    <div class="nav">
        <h1>Hospital Management System </h1>
        <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Index</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Contact Us </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn hover"><a class="btn-link" href="logOut.php">Logout</a></button><br>
    </div>
    <form action="forgetPasswordValidation.php" method="post" novalidate onsubmit="return isValid(this);">

        <fieldset>
            <legend></legend>
            <h2>Forget Password</h2>
            <table>
                <tr>
                    <td>

                        <b> Email:</b> <input class="label" type="email" placeholder="Enter your email here" name="email" id="email"
                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                        <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                        <span id="emailErr"></span><br><br>
                        

                        <b> Security Question:</b> <input class="label" type="text" name="securityQuestion" id="securityQuestion"
                            placeholder="What is you favourite food"
                            value="<?php echo isset($_SESSION['securityQuestion']) ? $_SESSION['securityQuestion'] : "" ?>">
                        <?php echo isset($_SESSION['securityQuestionErr']) ? $_SESSION['securityQuestionErr'] : "" ?>
                        <span id="securityQuestionErr"></span><br><br>





                    </td>
                </tr>
            </table>
        </fieldset><br>
        <input class="btn hover btn-link" type="submit" name="submit" id="submit" value="Done">
        <button class="btn hover"><a class="btn-link" href="login.php">Go back</a></button>
    </form>

</body>

<footer id="footer" >
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>