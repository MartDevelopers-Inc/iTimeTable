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

if (isset($_POST['Login'])) {
    $Login_username = $_POST['Login_username'];
    $Login_Rank = $_POST['Login_Rank'];
    $Login_password = sha1(md5($_POST['Login_password']));

    $stmt = $mysqli->prepare("SELECT Login_username, Login_password, Login_Rank, Login_id  FROM Login  WHERE Login_username =? AND Login_password =? AND Login_Rank = ?");
    $stmt->bind_param('sss', $Login_username, $Login_password, $Login_Rank);
    $stmt->execute(); //execute bind 

    $stmt->bind_result($Login_username, $Login_password, $Login_Rank, $Login_id);
    $rs = $stmt->fetch();
    $_SESSION['Login_id'] = $Login_id;
    $_SESSION['Login_Rank'] = $Login_Rank;

    /* Decide Login User Dashboard Based On User Rank */
    if ($rs) {
        header("location:dashboard");
    } else {
        $err = "Login Failed, Please Check Your Credentials And Login Permission ";
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
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                        </div>
                    </div>
                    <form method="POST" class="m-t-20">
                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" name="Login_username" type="text" required="" placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control" name="Login_password" type="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="col-12 text-center">
                                    <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In As</h6>
                                </div>
                                <div class="text-center">
                                    <select name="Login_Rank" class="custom-select mb-3">
                                        <option value="Administrator">Administrator</option>
                                        <option value="Staff">Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <button name="Login" class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group row m-t-30 mb-0">
                            <div class="col-12">
                                <a href="reset_password" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot Your Password?</a>
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