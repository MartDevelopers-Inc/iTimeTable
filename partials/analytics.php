<?php
/* Faculties */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Faculties` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($faculties);
$stmt->fetch();
$stmt->close();

/* Departments  */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Departments` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($departments);
$stmt->fetch();
$stmt->close();

/* Courses */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Courses` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($courses);
$stmt->fetch();
$stmt->close();


/* Modules */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Modules` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($modules);
$stmt->fetch();
$stmt->close();

/* System Admins */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Admins`  ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($admins);
$stmt->fetch();
$stmt->close();

/* Lecs  */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Lecturers` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($lecs);
$stmt->fetch();
$stmt->close();

/*  Students */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Students` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($students);
$stmt->fetch();
$stmt->close();

/* Student Groups  */
$query = "SELECT COUNT(*)  FROM `ezanaLMS_Groups` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($groups);
$stmt->fetch();
$stmt->close();
