<?php
require 'sql_config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DataBase Delete</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body style="background-color:#404040;">
        <div id="main-wrapper">
            <center>
                <!--                <h2>Select employee to delete:</h2>
                //$query = 'SELECT FIRST_NAME, LAST_NAME FROM EMPLOYEE';
                //$getEmployee = mysqli_query($con, $query);
                //
                  <form class="input_form" method = "post">
                  <select name="employees">
                //echo "<option>Name Selection</option>";
                //while ($row = mysqli_fetch_array($getEmployee)) {
                //echo "<option>" . $row[0] ." ". $row[1]. "</option>";
                //}
                </select>
                <br>
                <input name="delete_btn" type="submit" id="delete_button" value="Delete Employee" required/><br>
                </form>-->

                <form action="delete_employee.php" class="loginform" method="post">
                    <label>SSN of Employee to Delete:</label><br><br>
                    <input type="text" name="ssn"class="inputvalues" placeholder="Employee SSN" required/><br><br>
                    <input type="submit" name="submit_btn" id="delete_button" value="Delete Employee" required/><br>
                </form>
            </center>

            <?php
            if (isset($_POST['submit_btn'])) {
                $deleteSSN = $_POST['ssn'];

                if (strlen($deleteSSN) != 9) {
                    echo '<script type="text/javascript"> alert("SSN must be 9 numbers!") </script>';
                } else {
                    $query = "DELETE FROM EMPLOYEE WHERE SSN='$deleteSSN';";
                    $query_res = mysqli_query($con, $query);

                    if ($query_res) {
                        echo '<script type="text/javascript"> alert("Deletion Successful!") </script>';
                    } else {
                        echo '<script type="text/javascript"> alert("Deletion Failed!") </script>';
                    }
                }
            }
            ?>
            <input type="submit" id="back_button" value="Back" onclick="document.location.href = 'index.php'" required/>
        </div>
        <div>
            <center>
                <p>UNCG CSC 471-Gabriel Costa de Oliveira 2020</p>
            </center>
        </div>    
    </body>
</html>
