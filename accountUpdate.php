<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form</title>
    <script src="accountUpdate.js"></script>
    <link rel="stylesheet" href="accountUpdate.css">
</head>

<body>
    <?php


    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
        exit();
    }

    ?>
    <div class="nav">
        <h1 class="heading">Hospital Management System </h1>
        <a href="">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Index</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="">Contact Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn hover"><a class="btn-link" href="logOut.php">Logout</a></button>
    </div>

    <form action="accountUpdateValidation.php" method="post" novalidate onsubmit="return isValid(this);">
        <table>

            <td>
                <h1>Update Account Information</h1>
                <fieldset>
                    <!-- <legend><b> &nbsp; Update Account Form</b></legend><br><br> -->

                    <table>
                        <tr>
                            <td>
                                <img src="" alt="">

                                <b>Id :</b> <input class="label"
                                    placeholder="Enter your register Id (Id can not be changed)" type="number" name="id"
                                    value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : "" ?>">
                                <?php echo isset($_SESSION['idErr']) ? $_SESSION['idErr'] : "" ?>
                                <span id="idErr"></span><br><br>

                                <b>First Name:</b> <input class="label" type="text" placeholder="Enter your first name"
                                    name="firstName"
                                    value="<?php echo isset($_SESSION['firstName']) ? $_SESSION['firstName'] : "" ?>">
                                <?php echo isset($_SESSION['firstNameErr']) ? $_SESSION['firstNameErr'] : "" ?>
                                <span id="firstNameErr"></span><br><br>

                                <b>Last Name:</b> <input class="label" type="text" placeholder="Enter your last name"
                                    name="lastName"
                                    value="<?php echo isset($_SESSION['lastName']) ? $_SESSION['lastName'] : "" ?>">
                                <?php echo isset($_SESSION['lastNameErr']) ? $_SESSION['lastNameErr'] : "" ?>
                                <span id="lastNameErr"></span><br><br>


                                <b> Date of Birth :</b> <input class="label" type="date" name="dob" id="dob"
                                    value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : "" ?>">
                                <?php echo isset($_SESSION['dobErr']) ? $_SESSION['dobErr'] : "" ?>
                                <span id="dobErr"></span><br><br>





                                <b> Email:</b> <input class="label" type="email" placeholder="Enter your email here"
                                    name="email" id="email"
                                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>">
                                <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : "" ?>
                                <span id="emailErr"></span><br><br>


                                <b> Phone Number: </b><input class="label" type="tel" name="phoneNumber"
                                    placeholder="Enter Your Phone Number" id="phoneNumber"
                                    value="<?php echo isset($_SESSION['phoneNumber']) ? $_SESSION['phoneNumber'] : "" ?>">
                                <?php echo isset($_SESSION['phoneNumberErr']) ? $_SESSION['phoneNumberErr'] : "" ?>
                                <span id="phoneNumberErr"></span><br><br>


                                <b> Gender:</b>
                                <input type="radio" id="Male" name="gender" value="Male">
                                <label for="Male">Male</label>

                                <input type="radio" id="Female" name="gender" value="Female">
                                <label for="Female">Female</label><br>

                                <?php echo isset($_SESSION['genderErr']) ? $_SESSION['genderErr'] : "" ?>
                                <span id="genderErr"></span><br><br>


                                <b>Blood Group :</b><label class="label" for="bloodGroup"></label>
                                <select class="label" name="bloodGroup" id="bloodGroup" aria-placeholder="bloodGroup">
                                    <option value="">Select Your Option</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                                <?php echo isset($_SESSION['bloodGroupErr']) ? $_SESSION['bloodGroupErr'] : "" ?>
                                <span id="bloodGroupErr"></span><br><br>


                                <b> Security Question:</b> <input class="label" type="text" name="securityQuestion"
                                    id="securityQuestion" placeholder="What is you favourite food"
                                    value="<?php echo isset($_SESSION['securityQuestion']) ? $_SESSION['securityQuestion'] : "" ?>">
                                <?php echo isset($_SESSION['securityQuestionErr']) ? $_SESSION['securityQuestionErr'] : "" ?>
                                <span id="securityQuestionErr"></span><br><br>


                            </td>
                        </tr>
                    </table>
                </fieldset>



                <br>
                <input class="btn hover btn-link" type="submit" name="submit" id="submit" value="Submit">
                <button class="btn hover"><a class="btn-link" href="patientProfile.php"> Back</a></button>
        </table>
    </form>

</body>

<footer id="footer">
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>

</html>