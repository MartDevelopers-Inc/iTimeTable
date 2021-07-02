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

/* Add Semester */
if (isset($_POST['add_sem'])) {
    $error = 0;
    if (isset($_POST['Semester_name']) && !empty($_POST['Semester_name'])) {
        $Semester_name = mysqli_real_escape_string($mysqli, trim($_POST['Semester_name']));
    } else {
        $error = 1;
        $err = "Semester Name Cannot Be Empty";
    }
    if (isset($_POST['Semester_desc']) && !empty($_POST['Semester_desc'])) {
        $Semester_desc = $_POST['Semester_desc'];
    } else {
        $error = 1;
        $err = "Semester Desc Cannot Be Empty";
    }

    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  Semester WHERE  Semester_name='$Semester_name' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Semester_name == $row['YSemester_nameear_name']) {
                $err =  "$Semester_name Already Exists";
            }
        } else {
            /* Persist Changes In Database */
            $query = "INSERT INTO Semester (Semester_name, Semester_desc) VALUES(?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $Semester_name, $Semester_desc);
            $stmt->execute();
            if ($stmt) {
                $success = "$Semester_name Added";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Semester */
if (isset($_POST['update_sem'])) {
    $error = 0;
    if (isset($_POST['Semester_name']) && !empty($_POST['Semester_name'])) {
        $Semester_name = mysqli_real_escape_string($mysqli, trim($_POST['Semester_name']));
    } else {
        $error = 1;
        $err = "Semester Name Cannot Be Empty";
    }
    if (isset($_POST['Semester_desc']) && !empty($_POST['Semester_desc'])) {
        $Semester_desc = $_POST['Semester_desc'];
    } else {
        $error = 1;
        $err = "Semester Desc Cannot Be Empty";
    }
    if (isset($_POST['Semester_id']) && !empty($_POST['Semester_id'])) {
        $Semester_id = $_POST['Semester_id'];
    } else {
        $error = 1;
        $err = "Semester ID Cannot Be Empty";
    }

    if (!$error) {
        /* Persist Changes In Database */
        $query = "UPDATE  Semester SET Semester_name =?, Semester_desc =? WHERE Semester_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sss', $Semester_name, $Semester_desc, $Semester_id);
        $stmt->execute();
        if ($stmt) {
            $success = "$Semester_name Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}



/* Delete Year */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Semester WHERE Semester_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=semester");
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
                            <button type="button" data-toggle="modal" data-target="#AddSem" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Semester <span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Semesters </h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="AddSem" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Semester</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Semester Name</label>
                                    <input type="text" name="Semester_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Semester Details </label>
                                    <textarea name="Semester_desc" class="form-control Summernote" required rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_sem" class="btn btn-primary">Submit</button>
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
                                    <th>Semester Name</th>
                                    <th>Semester Details</th>
                                    <th>Manage Semester</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Semester` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($sem = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $sem->Semester_name; ?></td>
                                        <td class="bs-linebreak"><?php echo $sem->Semester_desc; ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$sem->Semester_id' data-toggle='modal' class='badge badge-warning'><i class ='fa fa-edit'></i> Update</a>
                                                        <a href='semester?delete=$sem->Semester_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->
                                            <div class="modal fade" id="update-<?php echo $sem->Semester_id; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Semester</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Semester Name</label>
                                                                    <input type="text" name="Semester_name" value="<?php echo $sem->Semester_name; ?>" class="form-control" required>
                                                                    <input type="hidden" name="Semester_id" value="<?php echo $sem->Semester_id; ?>" class="form-control" required>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Semester Details </label>
                                                                    <textarea name="Semester_desc" class="form-control Summernote" required rows="5"><?php echo $sem->Semester_desc; ?></textarea>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_sem" class="btn btn-primary">Submit</button>
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