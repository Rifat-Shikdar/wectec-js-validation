<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="updateForgetPassword.css">
  <script src="updateForgetPassword.js"></script>
  <title>Forget Password</title>
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
  <form action="updateForgetPasswordValidation.php" method="post" novalidate onsubmit="return isValid(this)";>

    <fieldset>
      <h2>Forget Password</h2>
      <table>
        <tr>
          <td>

            <b> Email:</b> <input class="label" type="email" name="email" id="email"
              value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
            <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
            <span id="emailErr"></span><br><br>

            <b>New Password:</b> <input class="label" type="password" name="newPassword" id="newPassword"
              value="<?php echo isset($_SESSION['newPassword']) ? $_SESSION['newPassword'] : "" ?>">
            <?php echo isset($_SESSION['newPasswordErr']) ? $_SESSION['newPasswordErr'] : "" ?>
            <span id="newPasswordErr"></span><br><br>

            <b> Confirm New Password:</b> <input class="label" type="password" name="confirmNewPassword"
              id="confirmNewPassword"
              value="<?php echo isset($_SESSION['confirmNewPassword']) ? $_SESSION['confirmNewPassword'] : "" ?>">
            <?php echo isset($_SESSION['confirmNewPasswordErr']) ? $_SESSION['confirmNewPasswordErr'] : "" ?>
            <span id="confirmNewPasswordErr"></span><br><br>




          </td>
        </tr>
      </table>
    </fieldset><br>
    <input class="btn hover btn-link" type="submit" name="submit" id="submit" value="Done">
    <button class="btn hover "><a class="btn-link" href="login.php">Go back</a></button>
  </form>

</body>

<footer id="footer">
  <h5>Hospital Management System</h5>
  <p>@copy right reserved</p>
</footer>

</html>