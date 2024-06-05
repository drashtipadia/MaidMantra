<?php
include("./connection.php");
$bookingid=$_POST['bookingid'];
$amount=$_POST['Pay_amount'];
$cardname=$_POST['cardholdername'];
$cardnumber=$_POST['cardnumber'];
$cardEdate=$_POST['cardexpiry'];
$cvv=$_POST['cardcvv'];
$status="Done";

$mid_query="SELECT maid_id from packagebooking WHERE pb_id=".$bookingid;
$mid_result=mysqli_query($con,$mid_query);
if($midrow=mysqli_fetch_array($mid_result))
{
    $maidid=$midrow[0];
}
//echo $maidid;
$maidquery="UPDATE maids SET maid_status='Booked' WHERE maid_id=".$maidid;
$maidresult=mysqli_query($con,$maidquery);

$query="UPDATE packagebooking SET p_cardname='".$cardname."',p_cardnumber='".$cardnumber."',p_cardcvv='".$cvv."',p_cardexpiry='".$cardEdate."',p_amount=".$amount.",p_status='".$status."'  WHERE pb_id=".$bookingid;
//echo $query;
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