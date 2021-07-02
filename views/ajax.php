<?php
/*
 * Created on Fri Jul 02 2021
 *
 * The MIT License (MIT)
 * Copyright (c) 2021 MartDevelopers Inc
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software
 * and associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial
 * portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 * TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

include('../config/pdoconfig.php');

/* Get Faculty ID */
if (!empty($_POST["FacultyName"])) {
    $id = $_POST['FacultyName'];
    $stmt = $DB_con->prepare("SELECT * FROM Faculty WHERE Faculty_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Faculty_id']);
    }
}



/* Get Department ID */
if (!empty($_POST["DepartmentName"])) {
    $id = $_POST['DepartmentName'];
    $stmt = $DB_con->prepare("SELECT * FROM Department WHERE Department_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Department_id']);
    }
}

/* Get Course ID */
if (!empty($_POST["CourseName"])) {
    $id = $_POST['CourseName'];
    $stmt = $DB_con->prepare("SELECT * FROM Courses WHERE Course_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Course_id']);
    }
}

/* Get Unit Id */
if (!empty($_POST["UnitName"])) {
    $id = $_POST['UnitName'];
    $stmt = $DB_con->prepare("SELECT * FROM Unit WHERE Unit_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Unit_id']);
    }
}
/* Get  Academic Year */
if (!empty($_POST["YearName"])) {
    $id = $_POST['YearName'];
    $stmt = $DB_con->prepare("SELECT * FROM Year WHERE Year_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Year_id']);
    }
}
/* Get Semester  */
if (!empty($_POST["SemesterName"])) {
    $id = $_POST['SemesterName'];
    $stmt = $DB_con->prepare("SELECT * FROM Semester WHERE Semester_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Semester_id']);
    }
}

/* Get Lecturer  */
if (!empty($_POST["LectuerName"])) {
    $id = $_POST['LectuerName'];
    $stmt = $DB_con->prepare("SELECT * FROM Lecturer WHERE Lecturer_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Lecturer_id']);
    }
}

/* Get Time  */
if (!empty($_POST["TimeName"])) {
    $id = $_POST['TimeName'];
    $stmt = $DB_con->prepare("SELECT * FROM Time WHERE Time_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Time_id']);
    }
}

/* Get Room Name */
if (!empty($_POST["RoomName"])) {
    $id = $_POST['RoomName'];
    $stmt = $DB_con->prepare("SELECT * FROM Room WHERE  Room_name = :id");
    $stmt->execute(array(':id' => $id));

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo htmlentities($row['Room_id']);
    }
}
