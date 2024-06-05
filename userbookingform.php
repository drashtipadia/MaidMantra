<?php
include("./header.php");
$id = $_GET['serid'];
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

   <title>Booking </title>
</head>

<body>
   <div class="mt-5"></div>
   <section class="py-5 ">
      <div class="container booking py-5 md-m-0">

         <div class="row py-3">
            <div class="col text-center">
               <h3>Booking Information </h3>
               <span class="line"></span>
            </div>
         </div>

         <div class="card m-5">
            <div class="row m-5">
               <div class="col m-0 p-0">
                  <form method="post" action="./insertbookingfrom.php" id="bookingform">
                     <input type="hidden" name="serviceid" value="<?php echo $id; ?>">
                     <!-- first step -->

                     <div class="part">

                        <div class="row p-4">
                           <?php
                           $genquery = "SELECT * FROM commonquestion LIMIT 1";
                           $genresult = mysqli_query($con, $genquery);
                           while ($genrow = mysqli_fetch_array($genresult)) { ?>
                              <input type="hidden" name="comQids[]" value="<?php echo $genrow[0]; ?>" />
                              <h2>Which gender you prefer:</h2>
                           </div>
                           <div class="row m-3">
                              <div class="col-md-4 ">
                                 <div class="form-check form-check-inline">
                                    <?php $gender = explode(",", $genrow[2]); ?>
                                    <label>
                                       <input class="form-check-input" type="radio" name="comvalues[]" id="gender"
                                          value="<?php echo $gender[0] ?>">
                                          
                                       <img src="./images/male.png" width="120px" height="130px" alt="option1" class="p-3" />
                                     
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-check form-check-inline">
                                    <label>
                                       <input class="form-check-input" type="radio" name="comvalues[]" id="gender"
                                          value="<?php echo $gender[1] ?>">
                                       <img src="./images/female.png" width="120px" height="130px" alt="option2" class="p-3">
                                    </label>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-check form-check-inline">
                                    <label>
                                       <input class="form-check-input" type="radio" name="comvalues[]" id="gender" checked
                                          value="<?php echo $gender[2] ?>">
                                       <img src="./images/any.png" width="120px" height="130px" alt="option3" class="p-3">
                                    </label>
                                 </div>
                              </div>
                              
                           </div>
                        <?php } ?>
                     </div>
                     <!-- First step end.. -->
                     <!-- second Part -->
                     <div class="part d-none">
                        <div class="row p-4">
                           <h5>Select the hours/salary</h5>
                        </div>
                        <?php
                        $salquery = "SELECT * FROM salary";
                        $salresult = mysqli_query($con, $salquery);
                        $i=0;
                        ?>
                        <div class="row g-4">
                           <?php while ($salrow = mysqli_fetch_array($salresult)) { 
                               $i=$i+1; ?>
                             
                              <div class="col-sm-6 col-lg-4  ">
                                 <div class="card">
                                    <label>
                                    <?php if($i==1) {?>
                                       <input type="radio" name="hour/salary" id="hour/salary" checked  value="<?php echo $salrow[0];?>">
                                       <?php } else{?>
                                          <input type="radio" name="hour/salary" id="hour/salary"  value="<?php echo $salrow[0]; ?>">
                                          <?php }?>
                                       <div class="card-body" id="cardsalary">                                         
                                          <h5 class="card-title">Hours : <?php echo $salrow[1]; ?></h5>                                          
                                          <p>Par day of salary</p>
                                          <p class="card-text">Salary : <?php echo $salrow[2]; ?></p>
                                          <p class="card-text"><?php if($id==2)
                                           {?>
                                           <b>Note:</b> <?php echo "per person amount count";
                                           }
                                           ?></p>
                                       </div>
                                    </label>
                                 </div>
                              </div>
                           <?php } ?>
                           
                        </div>
                     </div>
                     <!-- second part End -->
                     <!-- third step -->

                     <div class="part d-none p-4">
                        <!-- common question start -->
                        <section class="p-5">
                           <?php
                           $comquery = "SELECT * FROM  commonquestion LIMIT 2 OFFSET 1";
                           $comres = mysqli_query($con, $comquery);
                           while ($comrow = mysqli_fetch_array($comres)) { ?>
                              <input type="hidden" name="comQids[]" value="<?php echo $comrow[0]; ?>" />
                              <div class="row mt-3">
                                 <h5 class="col-md-4 from-label"><?php echo $comrow[1]; ?></h5>
                                 <div class="col-md-8">
                                    <?php if ($comrow[3] == "number") { ?>
                                       <input type="number" class="col-6 ml-0 w-25 form-control" min="1" max="15"
                                          name="comvalues[]" id="numberfield">
                                          <label class="d-none errmsg " id="numbermsg">Please Enter the number</label>
                                    <?php } else if ($comrow[3] == "text") { ?>
                                          <input type="text" class="col-10 ml-0 w-50 form-control" id="textfield" name="comvalues[]">
                                          <label class="d-none errmsg" id="txtmsg">Please Enter the text</label>
                                    <?php } else if ($comrow[3] == "date") { ?>
                                             <input type="date" id="datefield" class="col-9 ml-0 w-50 form-control" id="bdate"  name="comvalues[]" min="<?php echo(date('Y-m-d')); ?>" max="">
                                             <label class="d-none errmsg" id="datemsg">Please Enter the date</label>
                                    <?php } else if ($comrow[3] == "time") { ?>
                                                <input type="time" id="time" class="col-9 ml-0 w-50 form-control" name="comvalues[]">
                                                <label class="d-none errmsg" id="timemsg">Please Enter the Time</label>
                                    <?php } else if ($comrow[3] == "radio")
                                            {
                                              $radio = explode(",", $comrow[2]);
                                             for ($a = 0; $a < count($radio); $a++) { ?>
                                              <label class="border border-2" id="comradioqline">
                                                <div class="form-check form-check-inline ">
                                                    <input type="radio" class="form-check-input" name="comvalues[]"
                                                   value="<?php echo $radio[$i] ?>" />
                                                   <label  class="p-2 "  id="comradioq" ><?php echo $radio[$i] ?> </label>                                             
                                               </div>  
                                              </label> 
                                    <?php } } ?>
                                 </div>
                              </div>

                           <?php } ?>
                        </section>
                        <!-- common question end -->
                        <!-- specific value start -->
                        <section class="p-5">
                           <?php

                           $speQquery = "SELECT * FROM specificquestion where service_Id=$id";
                           $speQresult = mysqli_query($con, $speQquery);
                           while ($speQrow = mysqli_fetch_array($speQresult)) {

                              ?>
                              <div class="row mt-3">
                                 <div class="col-md-4">

                                    <input type="hidden" name="speQid[]" value="<?php echo $speQrow[0]; ?>" />
                                    <h4><?php echo $speQrow[1]; ?></h4>
                                 </div>
                                 <div class="col-md-8">
                                    <?php
                                    $value = explode(",", $speQrow[2]);

                                    for ($i = 0; $i < count($value); $i++) {
                                       ?>
                                       <label>
                                          <input type="checkbox" name="speQvalue[]" value="<?php echo $value[$i]; ?>"/>
                                          <label><?php echo $value[$i]; ?><label>
                                             </label>

                                          <?php } ?>
                                 </div>
                              </div>
                           <?php } ?>
                        </section>
                        <!-- specific value end -->
                        <!-- common question start -->
                        <section class="p-5">
                           <?php
                           $comquery = "SELECT * FROM  commonquestion LIMIT 20 OFFSET 3";
                           $comres = mysqli_query($con, $comquery);
                           while ($comrow = mysqli_fetch_array($comres)) { ?>
                              <input type="hidden" name="comQids[]" value="<?php echo $comrow[0]; ?>" />
                              <div class="row mt-3">
                                 <h5 class="col-md-4 from-label"><?php echo $comrow[1]; ?></h5>
                                 <div class="col-md-8">
                                    <?php if ($comrow[3] == "number") { ?>
                                       <input type="number" class="col-6 ml-0 w-25 form-control" min="1" max="15"
                                          name="comvalues[]" id="numberfield">
                                          <label class="d-none errmsg " id="numbermsg">Please Enter the number</label>
                                    <?php } else if ($comrow[3] == "text") { ?>
                                          <input type="text" class="col-10 ml-0 w-75 form-control" id="textfield" name="comvalues[]">
                                          <label class="d-none errmsg" id="txtmsg">Please Enter the text</label>
                                    <?php } else if ($comrow[3] == "date") { ?>
                                             <input type="date" id="datefield" class="col-9 ml-0 w-25 form-control"  name="comvalues[]" min="<?php echo(date('Y-m-d')); ?>" max="">
                                             <label class="d-none errmsg" id="datemsg">Please Enter the date</label>
                                    <?php } else if ($comrow[3] == "time") { ?>
                                                <input type="time" id="time" class="col-9 ml-0 w-25 form-control" name="comvalues[]">
                                                <label class="d-none errmsg" id="timemsg">Please Enter the Time</label>
                                    <?php } else if ($comrow[3] == "radio")
                                             {
                                                $radio = explode(",", $comrow[2]);
                                             for ($i = 0; $i < count($radio); $i++) { ?>
                                               <label class="border border-2" id="comradioqline">
                                              <div class="form-check form-check-inline ">
                                             
                                                <input type="radio" class="form-check-input" name="comvalues[]"
                                                   value="<?php echo $radio[$i] ?>" />
                                                   <label  class="p-2 "  id="comradioq" ><?php echo $radio[$i] ?> </label>
                                             
                                             </div>  
                                             </label> 
                                    <?php } } ?>
                                 </div>
                              </div>

                           <?php } ?>
                        </section>
                     </div>
                     <!-- Third step end -->


                     <div class="mt-3 d-flex justify-content-between">
                        <div class="text-start">
                           <button type="button" class="btn allbtn d-none" id="pre-btn">Previous</button>
                        </div>
                        <div class="text-end">
                           <button type="submit" class="btn  allbtn d-none" id="submit-btn">Submit</button>
                           <button type="button" class="btn allbtn" id="next-btn">Next</button>
                        </div>
                        
                     </div>
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