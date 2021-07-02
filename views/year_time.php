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

/* Add Year */
if (isset($_POST['add_year'])) {
    $error = 0;
    if (isset($_POST['Year_name']) && !empty($_POST['Year_name'])) {
        $Year_name = mysqli_real_escape_string($mysqli, trim($_POST['Year_name']));
    } else {
        $error = 1;
        $err = "Year Name Cannot Be Empty";
    }
    if (isset($_POST['Year_desc']) && !empty($_POST['Year_desc'])) {
        $Year_desc = $_POST['Year_desc'];
    } else {
        $error = 1;
        $err = "Year Desc Cannot Be Empty";
    }

    if (!$error) {
        //prevent Double entries
        $sql = "SELECT * FROM  Year WHERE  Year_name='$Year_name' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($Year_name == $row['Year_name']) {
                $err =  "$Year_name Already Exists";
            }
        } else {
            /* Persist Changes In Database */
            $query = "INSERT INTO Year (Year_name, Year_desc) VALUES(?,?)";
            $stmt = $mysqli->prepare($query);
            $rc = $stmt->bind_param('ss', $Year_name, $Year_desc);
            $stmt->execute();
            if ($stmt) {
                $success = "$Year_name Added";
            } else {
                $info = "Please Try Again Or Try Later";
            }
        }
    }
}

/* Update Year */
if (isset($_POST['update_year'])) {
    $error = 0;
    if (isset($_POST['Year_name']) && !empty($_POST['Year_name'])) {
        $Year_name = mysqli_real_escape_string($mysqli, trim($_POST['Year_name']));
    } else {
        $error = 1;
        $err = "Year Name Cannot Be Empty";
    }
    if (isset($_POST['Year_desc']) && !empty($_POST['Year_desc'])) {
        $Year_desc = $_POST['Year_desc'];
    } else {
        $error = 1;
        $err = "Year Desc Cannot Be Empty";
    }
    if (isset($_POST['Year_id']) && !empty($_POST['Year_id'])) {
        $Year_id = $_POST['Year_id'];
    } else {
        $error = 1;
        $err = "Year ID Cannot Be Empty";
    }

    if (!$error) {

        /* Persist Changes In Database */
        $query = "UPDATE Year  SET Year_name =?, Year_desc =? WHERE Year_id = ?";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('sss', $Year_name, $Year_desc, $Year_id);
        $stmt->execute();
        if ($stmt) {
            $success = "$Year_name Updated";
        } else {
            $info = "Please Try Again Or Try Later";
        }
    }
}
/* Delete Year */
if (isset($_GET['delete'])) {
    $delete = $_GET['delete'];
    $adn = "DELETE FROM Year WHERE Year_id=?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $delete);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=year_time");
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
                            <button type="button" data-toggle="modal" data-target="#AddYear" class="btn btn-custom dropdown-toggle waves-effect waves-light">Add Academic Year <span class="m-l-5"><i class="fa fa-plus"></i></span></button>
                        </div>
                        <h4 class="page-title">Academic Year </h4>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Add Modal -->
            <div class="modal fade" id="AddYear" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Academic Year</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Year Name</label>
                                        <input type="text" name="Year_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Year Details </label>
                                    <textarea name="Year_desc" class="form-control Summernote" required rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="submit" name="add_year" class="btn btn-primary">Submit</button>
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
                                    <th>Year Name</th>
                                    <th>Year Details</th>
                                    <th>Manage Years</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                $ret = "SELECT * FROM `Year` ";
                                $stmt = $mysqli->prepare($ret);
                                $stmt->execute(); //ok
                                $res = $stmt->get_result();
                                while ($year = $res->fetch_object()) {
                                ?>
                                    <tr>
                                        <td><?php echo $year->Year_name; ?></td>
                                        <td class="bs-linebreak"><?php echo $year->Year_desc; ?></td>
                                        <td>
                                            <?php
                                            if ($_SESSION['Login_Rank'] == 'Administrator') {
                                                /* Allow User To Delete And Update Faculty */
                                                echo
                                                "
                                                        <a href='#update-$year->Year_id' data-toggle='modal' class='badge badge-warning'><i class ='fa fa-edit'></i> Update</a>
                                                        <a href='year_time?delete=$year->Year_id'  class='badge badge-danger'><i class ='fa fa-trash'></i> Delete</a>

                                                    ";
                                            } else {
                                                /* Nothing */
                                            }
                                            ?>
                                            <!-- Update Modal -->
                                            <div class="modal fade" id="update-<?php echo $year->Year_id; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Year</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Year Name</label>
                                                                    <input type="text" name="Year_name" value="<?php echo $year->Year_name; ?>" class="form-control" required>
                                                                    <input type="hidden" name="Year_id" value="<?php echo $year->Year_id; ?>" class="form-control" required>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Year Details </label>
                                                                    <textarea name="Year_desc" class="form-control Summernote" required rows="5"><?php echo $year->Year_desc; ?></textarea>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button type="submit" name="update_year" class="btn btn-primary">Submit</button>
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