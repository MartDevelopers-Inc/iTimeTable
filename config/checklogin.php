<?php
/*
 * Created on Fri Jun 11 2021
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


function check_login()
{
	if ((strlen($_SESSION['id']) == 0) || (strlen($_SESSION['email']) == 0)) {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "admin_index.php";
		$_SESSION["id"] = "";
		$_SESSION["email"] = "";
		//$_SESSION["name"] = "";
		header("Location: http://$host$uri/$extra");
	}
}

/* Lecturer Check Login */
function lec_check_login()
{
	if ((strlen($_SESSION['id']) == 0) || (strlen($_SESSION['work_email']) == 0)) {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "lec_index.php";
		$_SESSION["id"] = "";
		$_SESSION["work_email"] = "";
		header("Location: http://$host$uri/$extra");
	}
}


/* Student Check Login */
function std_check_login()
{
	if ((strlen($_SESSION['id']) == 0) || (strlen($_SESSION['email']) == 0)) {
		$host = $_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = "std_index.php";
		$_SESSION["id"] = "";
		$_SESSION["email"] = "";
		header("Location: http://$host$uri/$extra");
	}
}
