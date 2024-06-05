<?php
include("./connection.php");
$bookingid=$_POST['bookingid'];
$amount=$_POST['Pay_amount'];
$cardname=$_POST['cardholdername'];
$cardnumber=$_POST['cardnumber'];
$cardEdate=$_POST['cardexpiry'];
$cvv=$_POST['cardcvv'];
$status="Done";
//echo $bookingid;
$mid_query="SELECT maid_id from booking WHERE b_id=".$bookingid;
$mid_result=mysqli_query($con,$mid_query);
if($midrow=mysqli_fetch_array($mid_result))
{
    $maidid=$midrow[0];
}
//echo $maidid;
$maidquery="UPDATE maids SET maid_status='Booked' WHERE maid_id=".$maidid;
$maidresult=mysqli_query($con,$maidquery);

$query="UPDATE booking SET card_name='".$cardname."',card_number='".$cardnumber."',card_cvv='".$cvv."',card_expirydate='".$cardEdate."',Amount=".$amount.",status='".$status."'  WHERE b_id=".$bookingid;
$result=mysqli_query($con,$query);
if(isset($result))
{
    echo "<script> alert('Payment Succesfully Done...'); window.location=('./userbookingprofile.php');</script>";
}
else{
   echo "Some error";
   echo mysqli_error($con);
}


?>