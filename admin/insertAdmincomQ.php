<?php
include("../connection.php");

$com_question=$_POST['commonquestion'];
$comQ_value=$_POST['questionvalue'];
$comQ_type=$_POST['valuetype'];
$query="INSERT INTO commonquestion(que_description,que_value,que_val_type) VALUES ('$com_question','$comQ_value','$comQ_type')";
//echo $query;
$result=mysqli_query($con,$query);
if($result)
{
    echo("<script> alert('record inserted successfully'); window.location = './admincommonQlist.php'; </script>");
}
else
{
    echo(mysqli_error($con));
}



?>