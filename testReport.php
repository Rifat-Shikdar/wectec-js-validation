
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form</title>
  <script src="testReport.js"></script>
  <link rel="stylesheet" href="testReport.css">
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

  <form action="testReportValidation.php" method="post" novalidate onsubmit="return isValid(this);">
    <table>

        <h2>Test Reports</h2><hr>
      <td>
        <fieldset>
          <!-- <legend><b> &nbsp; Reports</b></legend><br><br> -->

          <table>
            <tr>
              <td>
                
                <b>Test Name :</b><label for="testName"></label>
                <select class="label" name="testName" id="testName" aria-placeholder="testName">
                  <option value="">Select Your Option</option>
                  <option value="Blood Group Test">Blood Group Test</option>
                  <option value="Heart Test">Heart Test</option>
                  <option value="Blood Pressure Test">Blood Pressure Test</option>
                  <option value="Diabetes Test">Diabetes Test</option>
                  <option value="Dengue Test">Dengue Test"</option>
                  <option value="Fever Test">Fever Test</option>
                  
                </select>
                <?php echo isset($_SESSION['testNameErr']) ? $_SESSION['testNameErr'] : "" ?>
                <span id="testNameErr"></span><br><br>


                <b> Test Date:</b> <input class="label" type="date" name="testDate" id="testDate"
                  value="<?php echo isset($_SESSION['testDate']) ? $_SESSION['testDate'] : "" ?>">
                <?php echo isset($_SESSION['testDateErr']) ? $_SESSION['testDateErr'] : "" ?>
                <span id="testDateErr"></span><br><br>
            
                <b>Medical History :</b><label for="medicalHistory"></label>
                <select class="label" name="medicalHistory" id="medicalHistory" aria-placeholder="medicalHistory">
                  <option value="">Select Your Option</option>
                  <option value="Allergy">Allergy</option>
                  <option value="Asthma">Asthma</option>
                  <option value="High-Blood Pressure">High-Blood Pressure</option>
                  <option value="Diabetes ">Diabetes</option>
                  
              </select>
              <?php echo isset($_SESSION['medicalHistoryErr']) ? $_SESSION['medicalHistoryErr'] : "" ?>
              <span id="medicalHistoryErr"></span><br><br>

               


              </td>
            </tr>
          </table>
        </fieldset>



        <br>
        &nbsp;<input class="btn hover btn-link"  type="submit" name="submit" id="submit" value="Submit">
        <button class="btn hover"><a class="btn-link" href="report.php">Go back</a></button>
        <button class="btn hover"><a class="btn-link" href="patientProfile.php">Home</a></button>
    </table>
    </form>
</body>




<footer id="footer">
    <h5>Hospital Management System</h5>
    <p>@copy right reserved</p>
</footer>
</html>