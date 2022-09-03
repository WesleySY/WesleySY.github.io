<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>[ <a href="./list-student.php">List Student</a> | 
            <a href="./insert-student.php">Insert Student</a>]</p>
        <h1>Insert Student</h1>

        <?php
        if (isset($_POST["insert"])) {
            if (isset($_POST["studentId"])) {
                $id = $_POST["studentId"];
            } else {
                $id = "";
            }

            if (isset($_POST["studentName"])) {
                $name = $_POST["studentName"];
            } else {
                $name = "";
            }

            if (isset($_POST["gender"])) {
                $gender = $_POST["gender"];
            } else {
                $gender = "";
            }

            if (isset($_POST["program"])) {
                $program = $_POST["program"];
            } else {
                $program = "";
            }

            $error = array();
                        
            $conn = new mysqli("localhost", "root", "", "p4");
            $sql = "SELECT * FROM Student WHERE StudentID = '$id'";
            $result = $conn -> query($sql);
            if($result->num_rows > 0) {
                $error["id"] = "<b>Student ID</b> given already exist. Try another.";
            }
            $conn->close();
            
            if ($id == "") {
                $error["id"] = "Please enter <b>Student ID</b>";
            }
            if ($name == "") {
                $error["name"] = "Please enter <b>Student Name</b>";
            }
            if ($gender == "") {
                $error["gender"] = "Please select a <b>Gender</b>";
            }
            if ($program == "") {
                $error["program"] = "Please select a <b>Program</b>";
            }

            if (empty($error)) {
                $conn = new mysqli("localhost", "root", "", "p4");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO Student (StudentID, StudentName, Gender, Program)
                VALUES ('$id', '$name', '$gender', '$program')";

                $result = $conn->query($sql);

                if ($conn->affected_rows > 0) {
                    echo "<div>"
                    . "Student <b>$name</b> has been inserted. "
                    . "[ <a href='./list-student.php'>Back to list</a> ]"
                    . "</div>";
                    
                    $id = "";
                    $name = "";
                    $gender = "";
                    $program = "";
                }
                
                $conn -> close();
            }else {
                echo "<ul>";
                foreach ($error as $e) {
                    echo "<li>$e</li>";
                }
                echo "</ul>";
            }
        }
        ?>

        <form method="post" action="./insert-student.php">
            <table>
                <tr>
                    <td>Student ID :</td>
                    <td><input type="text" id="studentId" name="studentId" value="<?php 
                    if (isset($_POST["studentId"])) 
                        echo $id; 
                    ?>"></td>
                </tr>
                <tr>
                    <td>Student Name :</td>
                    <td><input type="text" id="studentName" name="studentName" value="<?php
                    if (isset($_POST["studentName"])) 
                        echo $name; 
                    ?>"></td>
                </tr>
                <tr>
                    <td>Gender :</td>
                    <td>
                        <input type="radio" id="female" value="F" name="gender" <?php
                        if (isset($_POST["gender"])) {
                            if ($gender == "F") {
                                echo "checked";
                            }
                        }
                        ?>><span> Female</span>
                        <input type="radio" id="male" value="M" name="gender" <?php
                        if (isset($_POST["gender"])) {
                            if ($gender == "M") {
                                echo "checked";
                            }
                        }
                        ?>><span> Male</span>
                    </td>
                </tr>
                <tr>
                    <td>Program :</td>
                    <td>
                        <select id="program" name="program">
                            <option value="" <?php
                            if (isset($_POST["program"])) {
                                if ($program == "") {
                                    echo "selected";
                                }
                            }
                            ?>>--Select One--</option>
                            <option value="IA" <?php
                            if (isset($_POST["program"])) {
                                if ($program == "IA") {
                                    echo "selected";
                                }
                            }
                            ?>>Information System Engineering</option>
                            <option value="IB" <?php
                            if (isset($_POST["program"])) {
                                if ($program == "IB") {
                                    echo "selected";
                                }
                            }
                            ?>>Business Information Systems</option>
                            <option value="IT" <?php
                            if (isset($_POST["program"])) {
                                if ($program == "IT") {
                                    echo "selected";
                                }
                            }
                            ?>>Internet Technology</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Insert" name="insert">
            <a href="./list-student.php"><input type="button" value="Cancel" name="cancel"></a>
        </form>    
    </body>
</html>
