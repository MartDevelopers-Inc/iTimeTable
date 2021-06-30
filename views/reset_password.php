<?php
/*
 * Created on Wed Jun 30 2021
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
include('../config/config.php');
if (isset($_POST['Reset_Password'])) {

    $Login_Username = $_POST['Login_Username'];
    $query = mysqli_query($mysqli, "SELECT * from `Login` WHERE Login_Username = '" . $Login_Username . "' ");
    $num_rows = mysqli_num_rows($query);

    if ($num_rows > 0) {
        $n = date('y');
        $new_password = bin2hex(random_bytes($n));
        $query = "UPDATE Login SET  Login_password=? WHERE  Login_Username =? ";
        $stmt = $mysqli->prepare($query);
        $rc = $stmt->bind_param('ss', $new_password, $Login_Username);
        $stmt->execute();
        if ($stmt) {
            $_SESSION['Login_Username'] = $Login_Username;

            $success = "Password Reset" && header("refresh:1; url=confirm_password");
        } else {
            $err = "Password reset failed";
        }
    } else {
        $err = "User Account Does Not Exist";
    }
}
require_once('../partials/head.php');
?>

<body>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="account-b">
            <div class="card-box mb-0">
                <div class="text-center m-t-20">
                    <a href="" class="logo">
                        <span>Automated Time Table Generator</span>
                    </a>
                </div>
                <div class="m-t-10 p-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Reset Password</h6>
                        </div>
                    </div>
                    <form class="m-t-30" method="POST">
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="text" name="Login_Username" required placeholder="Enter Your Username">
                            </div>
                        </div>

                        <div class="form-group row text-center m-t-20 mb-0">
                            <div class="col-12">
                                <button name="Reset_Password" class="btn btn-success btn-block waves-effect waves-light" type="submit">Reset Password</button>
                            </div>
                        </div>
                        <div class="form-group row m-t-30 mb-0">
                            <div class="col-12">
                                <a href="index" class="text-muted"><i class="fa fa-lock m-r-5"></i> Remembered Your Password?</a>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <!-- end wrapper page -->

    <!-- jQuery  -->
    <?php require_once('../partials/scripts.php'); ?>
</body>

</html>