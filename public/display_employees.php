<?php
require 'sql_config.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Employee Records</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body style="background-color: black;color: white">

    <center>
        <?php
        $query = "SELECT * FROM EMPLOYEE";
        $result = mysqli_query($con, $query);
        $attribute_query = "SELECT * FROM EMPLOYEE LIMIT 1";
        $attribute_result = mysqli_query($con, $attribute_query);
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
        echo "</table>"; //Close the table in HTML
        ?>
    </center>


    <input type="submit" id="back_button" value="Back" onClick="document.location.href = 'index.php'"/>
</body>
</html>