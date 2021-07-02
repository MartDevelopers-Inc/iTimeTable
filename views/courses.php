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


session_start();
require_once('../config/config.php');
require_once('../config/checklogin.php');
check_login();

/* Add Course */
if (isset($_POST['add_course'])) {
    $error = 0;
    if (isset($_POST['Course_name']) && !empty($_POST['Course_name'])) {
        $Course_name = mysqli_real_escape_string($mysqli, trim($_POST['Course_name']));
    } else {
        $error = 1;
        $err = "Course Name Cannot Be Empty";
    }
    if (isset($_POST['Course_desc']) && !empty($_POST['Course_desc'])) {
        $Course_desc = $_POST['Course_desc'];
    } else {
        $error = 1;
        $err = "Course Details Cannot Be Empty";
    }
    if (isset($_POST['Course_Department_id']) && !empty($_POST['Course_Department_id'])) {
        $Course_Department_id = $_POST['Course_Department_id'];
    } else {
        $error = 1;
        $err = "Course Department ID Details Cannot Be Empty";
    }

    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  Courses WHERE  Course_name='$Course_name' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Course_name == $row['Course_name']) {
                $err =  "$Course_name Already Exists";
            }
        } else {
            /* Persist Changes In Database */
            $query = "INSERT INTO Courses (Course_name, Course_desc, Course_Department_id ) VALUES(?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sss', $Course_name, $Course_desc, $Course_Department_id);
            $stmt->execute();
            if ($stmt) {
                $success = "$Course_name Added";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Course */
if (isset($_POST['update_course'])) {
    $error = 0;
    if (isset($_POST['Course_name']) && !empty($_POST['Course_name'])) {
        $Course_name = mysqli_real_escape_string($mysqli, trim($_POST['Course_name']));
    } else {
        $error = 1;
        $err = "Course Name Cannot Be Empty";
    }
    if (isset($_POST['Course_desc']) && !empty($_POST['Course_desc'])) {
        $Course_desc = $_POST['Course_desc'];
    } else {
        $error = 1;
        $err = "Course Details Cannot Be Empty";
    }
    if (isset($_POST['Course_id']) && !empty($_POST['Course_id'])) {
        $Course_id = $_POST['Course_id'];
    } else {
        $error = 1;
        $err = "Course  ID Details Cannot Be Empty";
    }

    if (!$error) {
        /* Persist Changes In Database */
        $query = "UPDATE  Courses SET Course_name =?, Course_desc =? WHERE Course_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sss', $Course_name, $Course_desc, $Course_id);
        $stmt->execute();
        if ($stmt) {
            $success = "$Course_name Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}

/* Delete Faculty */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Courses WHERE Course_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=courses");
    } else {
        $info = "Please Try Again Or Try Later";
    }
}

require_once('../partials/head.php');
?>

<body>

    <!-- Navigation Bar-->
    <header id="topnav">
        <?php require_once('../partials/topbar.php'); ?>

    </header>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right m-t-15">
                            <button type="button" data-toggle="modal" data-target="#AddCourses" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Department <span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Courses</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="AddDepartment" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Select Department Name</label>
                                        <select class="form-control" id="DepartmentName" onchange="GetDepartmentDetails(this.value)">
                                            <option>Select Department Name</option>
                                            <?php

                                            $ret = "SELECT * FROM `Department` ";
                                            $stmt = $mysqli->prepare($ret);
                                            $stmt->execute(); //ok
                                            $res = $stmt->get_result();
                                            while ($department = $res->fetch_object()) {
                                            ?>
                                                <option><?php echo $department->Department_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" name="Course_Department_id" id="DepartmentID">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Course Name</label>
                                        <input type="text" name="Course_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Course Details </label>
                                    <textarea name="Course_desc" class="form-control Summernote" required rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_course" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Modal -->


            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-bordered dt-responsive wrap">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Course Details</th>
                                    <th>Manage Course</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Courses` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($courses = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $courses->Course_name; ?></td>
                                        <td class="bs-linebreak"><?php echo $courses->Course_desc; ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$courses->Course_id' data-toggle='modal' class='badge badge-warning'><i class ='fa fa-edit'></i> Update</a>
                                                        <a href='courses?delete=$courses->Course_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->
                                            <div class="modal fade" id="update-<?php echo $courses->Course_id; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Course</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Course Name</label>
                                                                    <input type="text" name="Course_name" value="<?php echo $courses->Course_name; ?>" class="form-control" required>
                                                                    <input type="hidden" name="Course_id" value="<?php echo $courses->Course_id; ?>" class="form-control" required>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Course Details </label>
                                                                    <textarea name="Course_desc" class="form-control Summernote" required rows="5"><?php echo $courses->Course_desc; ?></textarea>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_department" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Modal -->
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- Footer -->
        <?php require_once('../partials/footer.php'); ?>
        <!-- End Footer -->

    </div>
    <!-- Scripts -->
    <?php require_once('../partials/scripts.php'); ?>

</body>

</html>