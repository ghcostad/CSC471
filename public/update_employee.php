<?php
require 'sql_config.php';
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DataBase Update</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body style="background-color: black;color: white;">
        <div id="main-wrapper">
            <center>
                <form action="update_employee.php" class="loginform" method="post">
                    <label>SSN of Employee to Update:</label><br><br>
                    <input type="text" name="ssn"class="inputvalues" placeholder="Employee SSN" required/><br><br>
                    <input type="submit" name="submit_btn" id="delete_button" value="Select Employee" required/><br>
                </form>
            </center>
        </div><br><br>

        <?php
        if (isset($_POST['submit_btn'])) {
            $updateSSN = $_POST['ssn'];
            $_SESSION["SSN"] = $updateSSN;
            $boolean = false;

            if (strlen($updateSSN) != 9) {
                echo '<script type="text/javascript"> alert("SSN must be 9 numbers!") </script>';
            } else {
                $query = "SELECT * FROM EMPLOYEE WHERE SSN=" . $updateSSN;
                $result = mysqli_query($con, $query);
                $attribute_query = "SELECT * FROM EMPLOYEE LIMIT 1";
                $attribute_result = mysqli_query($con, $attribute_query);
                echo "<div id='main-wrapper'>";
                echo "<center>";
                echo "<table><tr>";
                while ($atribute = mysqli_fetch_field($attribute_result)) {
                    echo "<td>" . $atribute->name . "</td>";
                }
                echo "</tr>";
                while ($row = mysqli_fetch_row($result)) {
                    echo"<tr>";
                    foreach ($row as $cell) {
                        echo "<td>" . $cell . "</td>";
                    }
                    echo"</tr>";
                }
                echo "</table>"; //Close the table in HTML}
                echo "</center>";
                echo "<div>";
                $boolean = true;
            }
        }

        if ($boolean) {
            ?>
            <br><br>
            <div id="main-wrapper">
                <center>
                    <form class="input_form" method = "post">
                        <label>Select Field to Update:</label><br><br>
                        <select name = "update_argument" class="inputvalues">
                            <option>SSN</option>
                            <option>DATE_OF_BIRTH</option>
                            <option>FIRST_NAME</option>
                            <option>MID_INITIAL</option>
                            <option>LAST_NAME</option>
                            <option>ADDRESS</option>
                            <option>EMPLOYEE_TYPE</option>
                        </select>
                        <input name="select_btn" type="submit" id="add_button" value="Select" required/><br>
                    </form>
                </center>
            </div>
            <?php
        }

        if (isset($_POST['update_argument'])) {
            $argument = $_POST['update_argument'];
            $_SESSION["argument"] = $argument;
            ?>
            <div id="main-wrapper">
                <center>
                    <form class="loginform" method="post">
                        <label>Update Value:</label><br>
                        <input name="update_value" type="text" class="inputvalues" placeholder="Employee first name" required/><br><br>
                        <input type="submit" id="add_button" value="Update" required/><br>
                    </form>
                </center>
            </div>
            <?php
        }
        ?>

        <?php
        if (isset($_POST['update_value'])) {
            $updateValue = strtoupper($_POST['update_value']);
            $argument = $_SESSION["argument"];
            $updateSSN = $_SESSION["SSN"];
            $updateQueery = "UPDATE EMPLOYEE SET $argument = '$updateValue' WHERE SSN = '$updateSSN';";
            $qUpdate = mysqli_query($con, $updateQueery);
            if ($qUpdate) {
                echo '<script type="text/javascript"> alert("Success!") </script>';
            } else {
                echo '<script type="text/javascript"> alert("Error!") </script>';
            }
        }
        ?>
        <div>
            <input type="submit" id="back_button" value="Back" onclick="document.location.href = 'index.php'" required/>
        </div>    
        <div>
            <center>
                <p>UNCG CSC 471-Gabriel Costa de Oliveira 2020</p>
            </center>
        </div>    
    </body>
</html>

