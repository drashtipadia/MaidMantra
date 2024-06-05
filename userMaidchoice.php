<?php
include("./header.php");
$id = $_GET['serviceid'];
$gender = $_GET['gender'];
if ($gender == 'F') {
   $gender = 'female';
} else if ($gender == 'M') {
   $gender = 'male';
} else {
   $gender = 'any';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="./css/bootstrap.min.css" />
   <link rel="stylesheet" href="./css/all.min.css" />
   <link rel="stylesheet" href="./css/style.css" />
   <link rel="stylesheet" href="./css/form.css" />
   <link rel="icon" href="./images/icon.jpg" />

   <title>Service </title>
</head>

<body>
   <div class="mt-5"></div>
   <section class="py-5">
      <div class="container booking py-5">

         <div class="row py-3">
            <div class="col text-center">
               <h3>Booking Information </h3>
               <span class="line"></span>
            </div>
         </div>
         <div class="card m-5">
            <div class="row m-5">
               <div class="col m-0 p-0">
                  <form method="post" action="./insertMaidchoice.php">
                     <?php
                     if ($gender == "any") {
                        $maidquery = "SELECT * FROM maids,service WHERE maids.service_Id=service.service_Id and maids.service_Id=$id and maids.maid_status='Availble'";
                        $maidresult = mysqli_query($con, $maidquery);
                     } else {
                        $maidquery = "SELECT * FROM maids,service WHERE maids.service_Id=service.service_Id and maids.maid_gender='".$gender."' and  maids.service_Id=$id and maids.maid_status='Availble'";
                        // echo $maidquery;
                        $maidresult = mysqli_query($con, $maidquery);
                     }
                     ?>
                     <div class="row g-4">
                        <?php
                         if (mysqli_num_rows($maidresult) == 0) {
                           echo "<h3 class='text-center'>Oops no maids available</h3>";
                         } else {
                           while ($maidRow = mysqli_fetch_array($maidresult)) { ?>
                              <div class="col-sm-6 col-lg-4 ">

                                 <div class="card w-100 h-100" >
                                    <label>

                                       <input type="radio" name="maidsid" value="<?php echo $maidRow[0]; ?>" checked>
                                       
                                       <div class="card-body" id="maidchoice">


                                          <?php
                                            $file = ($maidRow[5]);
                                          ?>
                                          <img src="./images/<?php echo ($file); ?>" class="card-img-top"  alt="..." height="220px">
                                       <br/>
                                       <br/>
                                       
                                          <h5 class="card-title"> <?php echo $maidRow[1]; ?></h5>
                                          <p class="card-text">Age : <?php echo $maidRow[2]; ?></p>
                                          <p class="card-text">Gender : <?php echo $maidRow[3]; ?></p>
                                          <p class="card-text">Number : <?php echo $maidRow[4]; ?></p>
                                          <p class="card-text">Provide Service : <?php echo $maidRow[9]; ?></p>
                                       </div>
                                    </label>
                                 </div>

                              </div>
                           <?php } 
                         ?>
                     </div>

                     <div class="text-end mt-3">
                        <input type="submit" class="btn allbtn  btn-lg" value="Confirm" />
                     </div>
                     <?php }?>
                  </form>
               </div>
            </div>
         </div>
      </div>

   </section>



   <script src="./javascript/bookingprocess.js"></script>
   <script src="./javascript/bootstrap.js"></script>
   <script src="./javascript/all.min.js"></script>
  

</body>

</html>


<?php include("./footer.php"); ?>