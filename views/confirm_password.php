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

if (isset($_POST['Confirm_Password'])) {

    $Login_Username  = $_SESSION['Login_Username'];
    $new_password = sha1(md5($_POST['new_password']));
    $confirm_password = sha1(md5($_POST['confirm_password']));
    /* Check If Passwords Match */
    if ($new_password != $confirm_password) {
        /* Die */
        $err = "Passwords Does Not Match";
    } else {
        /* Update Password */
        $query = "UPDATE Login  SET  Login_password =? WHERE  Login_Username = '$Login_Username' ";
        $stmt = $mysqli->prepare($query);
        //bind paramaters
        $rc = $stmt->bind_param('s',  $confirm_password);
        $stmt->execute();
        if ($stmt) {
            $success = "Password Reset" && header("refresh:1; url=index");
        } else {
            $err = "Password Reset Failed";
        }
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
                                <input class="form-control" type="password" name="new_password" required placeholder="Enter New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" type="password" name="confirm_password" required placeholder="Confirm Your Password">
                            </div>
                        </div>

                        <div class="form-group row text-center m-t-20 mb-0">
                            <div class="col-12">
                                <button name="Confirm_Password" class="btn btn-success btn-block waves-effect waves-light" type="submit">Confirm Password</button>
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