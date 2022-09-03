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
        <h1>List Student</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Program</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "p4");
                $result = $conn->query("SELECT * FROM Student");
                if ($result) {
                    while ($row = $result->fetch_object()) {
                        //Program
                        if ($row->Program == 'IA') {
                            $resultProgram = 'IA - Information System Engineering';
                        } else if ($row->Program == 'IB') {
                            $resultProgram = 'IB - Business Information Systems';
                        } else if ($row->Program == 'IT') {
                            $resultProgram = 'IT - Internet Technology';
                        }

                        //Gender
                        if ($row->Gender == 'F') {
                            $resultGender = 'Female';
                        } else if ($row->Gender == 'M') {
                            $resultGender = 'Male';
                        }

                        //Display in table
                        printf("<tr>"
                                . "<td>%s</td>"
                                . "<td>%s</td>"
                                . "<td>%s</td>"
                                . "<td>%s</td>"
                                . "</tr>",
                                $row->StudentID,
                                $row->StudentName,
                                $resultGender,
                                $resultProgram);
                    }
                    printf("<tfoot>"
                            . "<tr >"
                            . "<td colspan = 4>"
                            . "%s record(s) returned. "
                            . "[ <a href='./insert-student.php'>Insert Student</a> ]"
                            . "</td>"
                            . "</tr>"
                            . "</tfoot>"
                            , $result->num_rows);
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
