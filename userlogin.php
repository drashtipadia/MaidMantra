<?php
session_start();
include("./connection.php");
$loginemail = $_POST['lemail'];
$loginpassword = $_POST['lpassword'];
// echo($loginemail.$loginpassword);
$loginquery = "SELECT * FROM user WHERE email='" . $loginemail . "' and password='" . $loginpassword . "'";
// echo ($loginquery);
$loginres = mysqli_query($con, $loginquery);
// echo($loginres);
if (mysqli_num_rows($loginres) == 1) {
   $loginrow = mysqli_fetch_row($loginres);
   $_SESSION['u_id'] = $loginrow[0];
   $_SESSION['u_name'] = $loginrow[1];
   header("Location:./index.php");
   //echo("vaild");
} else {
   header("Location:./index.php?loginerr=invalid");
}




?>