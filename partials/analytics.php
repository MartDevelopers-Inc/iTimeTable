<?php
/* Faculties */
$query = "SELECT COUNT(*)  FROM `Faculty` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($faculties);
$stmt->fetch();
$stmt->close();

/* Departments  */
$query = "SELECT COUNT(*)  FROM `Department` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($departments);
$stmt->fetch();
$stmt->close();

/* Courses */
$query = "SELECT COUNT(*)  FROM `Courses` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($courses);
$stmt->fetch();
$stmt->close();


/* Modules */
$query = "SELECT COUNT(*)  FROM `Unit` ";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($units);
$stmt->fetch();
$stmt->close();
