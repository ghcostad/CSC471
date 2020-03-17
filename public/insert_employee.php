<?php
require 'sql_config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insert Employee</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body style="background-color:#404040;">
        <div id="main-wrapper">
            <center>
                <h2>Employee Insertion</h2>
            </center>
            <form class="input_form" method = "post">
                <center>
                    <label>First Name:</label><br>
                    <input name="fname" type="text" class="inputvalues" placeholder="Employee first name" required/><br><br>

                    <label>Middle Initial:</label><br>
                    <input name="mname" type="text" class="inputvalues" placeholder="Employee middle name initial" required/><br><br>

                    <label>Last Name:</label><br>
                    <input name="lname" type="text" class="inputvalues" placeholder="Employee last name" required/><br><br>

                    <label>Date of Birth:</label><br>
                    <input name="dob" type="date" class="inputvalues" placeholder="Employee date of birth" required/><br><br>

                    <label>Social Security Number:</label><br>
                    <input name="ssn" type="text" class="inputvalues" placeholder="Employee SSN" required/><br><br>

                    <label>Address:</label><br>
                    <input name="address" type="text" class="inputvalues" placeholder="Employee address" required/><br><br>

                    <label>Employee Type:</label><br>
                    <select name = "etype" class="inputvalues">
                        <option>Salary</option>
                        <option>Hourly</option>
                    </select><br><br>

                    <input name="submit_btn" type="submit" id="add_button" value="Add Employee" required/><br>
                </center>
                <input type="submit" id="back_button" value="Back" onclick="document.location.href = 'index.php'" required/>	
            </form>
            <?php
            if (isset($_POST['submit_btn'])) {
                $firstname = strtoupper($_POST['fname']);
                $lastname = strtoupper($_POST['lname']);
                $mname = strtoupper($_POST['mname']);
                $address = strtoupper($_POST['address']);
                $ssn = strtoupper($_POST['ssn']);
                $etype = strtoupper($_POST['etype']);
                $dob = strtoupper($_POST['dob']);
                $query = "INSERT INTO EMPLOYEE VALUES('$ssn','$dob','$firstname','$mname', '$lastname', '$address', '$etype')";

                $query_run = mysqli_query($con, $query);

                if ($query_run) {
                    echo '<script type="text/javascript"> alert("Success!") </script>';
                } else {
                    echo '<script type="text/javascript"> alert("Error!") </script>';
                }
            }
            ?>
        </div>
    </body>
</html>