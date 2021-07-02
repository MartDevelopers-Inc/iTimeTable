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

/* Add Department */
if (isset($_POST['add_department'])) {
    $error = 0;
    if (isset($_POST['Department_name']) && !empty($_POST['Department_name'])) {
        $Department_name = mysqli_real_escape_string($mysqli, trim($_POST['Department_name']));
    } else {
        $error = 1;
        $err = "Department Name Cannot Be Empty";
    }
    if (isset($_POST['Department_desc']) && !empty($_POST['Department_desc'])) {
        $Department_desc = $_POST['Department_desc'];
    } else {
        $error = 1;
        $err = "Department Details Cannot Be Empty";
    }
    if (isset($_POST['Department_faculty_id']) && !empty($_POST['Department_faculty_id'])) {
        $Department_faculty_id = $_POST['Department_faculty_id'];
    } else {
        $error = 1;
        $err = "Department Faculty Details Cannot Be Empty";
    }

    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  Department WHERE  Department_name='$Department_name' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Department_name == $row['Department_name']) {
                $err =  "$Department_name Already Exists";
            }
        } else {
            /* Persist Changes In Database */
            $query = "INSERT INTO Department (Department_name, Department_desc, Department_faculty_id ) VALUES(?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('sss', $Department_name, $Department_desc, $Department_faculty_id);
            $stmt->execute();
            if ($stmt) {
                $success = "$Department_name Added";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Department */
if (isset($_POST['update_department'])) {
    $error = 0;
    if (isset($_POST['Department_name']) && !empty($_POST['Department_name'])) {
        $Department_name = mysqli_real_escape_string($mysqli, trim($_POST['Department_name']));
    } else {
        $error = 1;
        $err = "Department Name Cannot Be Empty";
    }
    if (isset($_POST['Department_desc']) && !empty($_POST['Department_desc'])) {
        $Department_desc = $_POST['Department_desc'];
    } else {
        $error = 1;
        $err = "Department Details Cannot Be Empty";
    }
    if (isset($_POST['Department_id']) && !empty($_POST['Department_id'])) {
        $Department_id = $_POST['Department_id'];
    } else {
        $error = 1;
        $err = "Department ID Cannot Be Empty";
    }

    if (!$error) {
        /* Persist Changes In Database */
        $query = "UPDATE Department  SET Department_name =?, Department_desc =? WHERE Department_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sss', $Department_name, $Department_desc, $Department_id);
        $stmt->execute();
        if ($stmt) {
            $success = "$Department_name Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}

/* Delete Faculty */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Department WHERE Department_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=departments");
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
                            <button type="button" data-toggle="modal" data-target="#AddFaculty" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Faculty <span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Departments</h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="AddFaculty" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Faculty Name</label>
                                    <select class="form-control" id="FacultyName" onchange="GetFacultyDetails(this.value)">
                                        <option>Select Faculty Name</option>
                                        <?php

                                        $ret = "SELECT * FROM `Faculty` ";
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        while ($faculty = $res->fetch_object()) {
                                        ?>
                                            <option><?php echo $faculty->Faculty_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <input type="hidden" name="Department_faculty_id" id="FacultyID">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Department Name</label>
                                    <input type="text" name="Department_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Department Details </label>
                                    <textarea name="Department_desc" class="form-control Summernote" required rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_department" class="btn btn-primary">Submit</button>
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
                                    <th>Department Name</th>
                                    <th>Faculty Details</th>
                                    <th>Manage Department</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Department` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($dep = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $dep->Department_name; ?></td>
                                        <td class="bs-linebreak"><?php echo $dep->Department_desc; ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$dep->Department_id' data-toggle='modal' class='badge badge-warning'><i class ='fa fa-edit'></i> Update</a>
                                                        <a href='departments?delete=$dep->Department_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->
                                            <div class="modal fade" id="update-<?php echo $dep->Department_id; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Department</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Department Name</label>
                                                                    <input type="text" name="Department_name" value="<?php echo $dep->Department_name; ?>" class="form-control" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Department Details </label>
                                                                    <textarea name="Department_desc" class="form-control Summernote" required rows="5"><?php echo $dep->Department_desc; ?></textarea>
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