<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <script src="login.js"></script>
    <link rel="stylesheet" href="login.css">

</head>

<body>

    
    <h1>Hospital Management System </h1>
    
    
   
    <form action="loginValidation.php" method="post" novalidate id="form" onsubmit="return isValid(this);">
        
        <?php echo isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : ""; ?>

            <br>
        <fieldset id="fieldset">
            <legend id="legend">&nbsp;&nbsp;Log In</legend>
            <table>
                <tr>
                    <td>

                    
                    <b> </b> <input class="email" type="email" placeholder="Enter Your Email Here" name="email" id="email"
                  value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>

                <span id="emailErr"></span><br><br>
                <br><br>

                    

                
                <b></b> <input class="password" type="password" name="password" id="password" placeholder="Enter Your Password Here"
                  value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : "" ?>">
                <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : "" ?>
                <span id="passErr"></span>
                <!-- <span id="ErrMsg"></span> -->
               
                <br><br>
                
                
                <label for="rememberMe">
                <input type="checkbox" name="rememberMe" id="rememberMe"
                    value="checked" />
                Remember Me
            </label>
            
                    </td>
                </tr>
            </table>
        </fieldset><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input class="hover login"  type="submit" name="submit" id="submit" value="Log in">&nbsp;&nbsp;<br><br>
        <a  href="forgetPassword.php" id="forget_password">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Forget Password ? </a>

       
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Do not have any Account ?</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; For Sign up &nbsp;&nbsp;<button class="hover"><a class="btn_registration " href="registration.php">Registration</a></button></p>

        

        <?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : "" ?>


    </form>

</body>

<footer id="footer">
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>


