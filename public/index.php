<?php
require 'sql_config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DataBase Main</title>
        <link rel="stylesheet" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body style="background-color:#404040;">
        <div id="main-wrapper">
            <center>
                <h2>Database Main Menu</h2>
                <input type="submit" id="add_button" value="Add Employee" onClick="document.location.href = 'insert_employee.php'"/><br>
                <input type="submit" id="update_button" value="Update Employee" onClick="document.location.href = 'update_employee.php'"/><br>
                <input type="submit" id="delete_button" value="Delete Employee" onClick="document.location.href = 'delete_employee.php'"/><br>
                <input type="submit" id="display_button" value="View All Employees" onClick="document.location.href = 'display_employees.php'"/><br>
            </center>
        </div>
        <div>
            <center>
                <p>UNCG CSC 471-Gabriel Costa de Oliveira 2020</p>
            </center>
        </div>    
    </body>
</html>