<?php
include("./header.php");
$id = $_GET['serid'];
$pid=$_GET['packid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="./css/bootstrap.min.css" />
   <link rel="stylesheet" href="./css/all.min.css" />
   <link rel="stylesheet" href="./css/style.css" />
   <link rel="icon" href="./images/icon.jpg" />

   <title>Pacakage Booking </title>
</head>

<body>
   <div class="mt-5"></div>
   <section class="py-5">
        <div class="container booking py-5">
 
            <div class="row md-py-3">
                <div class="col text-center">
                    <h3>Booking Information </h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="card m-5">
                <div class="row m-5">
                    <div class="col m-0 p-0">
                        <form method="post" action="./insertPackagefrom.php" id="packagebookform">
                            <input type="hidden" name="pacid" value="<?php echo $pid; ?>">
                            <input type="hidden" name="serid" value="<?php echo $id; ?>">
                            <div class="border border-secondary p-3 text-center">
                                <label><h5>Select the Month : </h5></label>
                                <label>
                                  <div class="form-check form-check-inline ">
                                   
                                    <input class="form-check-input" type="radio" name="month" id="inlineRadio1" value="1" checked>
                                    <label class="form-check-label"  id="comradioq"><h6> 1 Month</h6></label>
                                    </label>
                                  </div>
                                </label>
                                <label>
                                    <div class="form-check form-check-inline ">
                                    
                                    <input class="form-check-input" type="radio" name="month" id="inlineRadio2" value="2">
                                    <label class="form-check-label"  id="comradioq"><h6> 2 Month</h6></label>
                                    
                                    </div>
                                </label>
                                <label>
                                    <div class="form-check form-check-inline ">
                                    
                                    <input class="form-check-input" type="radio" name="month" id="inlineRadio3" value="3">
                                    <label class="form-check-label"  id="comradioq"><h6> 3 Month</h6></label>
                                    </div>
                                </label>
                            </div>
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
                                    
                                <div class="col-sm-6 col-lg-3  ">
                                    <div class="card">
                                        <label>                                        
                                            <input type="radio" name="hour/salary" id="hour/salary"  value="<?php echo $salrow[0]; ?>" checked>                                                
                                            <div class="card-body" id="cardsalary">                                         
                                                <h5 class="card-title">Hours : <?php echo $salrow[1]; ?></h5>                                          
                                                 <h5 class="card-title">Salary : <?php echo $salrow[2]; ?></h5>
                                                 <h6>Note:This is salary define in day wise</h6>
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
                            
                            <section class="py-3">
                                <?php
                                $comquery = "SELECT * FROM  commonquestion WHERE que_description!='Days'";
                                $comres = mysqli_query($con, $comquery);
                                while ($comrow = mysqli_fetch_array($comres)) { ?>
                                    <input type="hidden" name="comQids[]" value="<?php echo $comrow[0]; ?>" />
                                    <div class="row mt-3">
                                        <h5 class="col-md-4 from-label"><?php echo $comrow[1]; ?></h5>
                                        <div class="col-md-8">
                                            <?php if ($comrow[3] == "number") { ?>
                                            <input type="number" id="numberfield" class="col-6 ml-0 w-25 form-control" min="1" max="15"
                                                name="comvalues[]">
                                                <label class="d-none errmsg" id="numbermsg">Please Enter the Number</label>
                                            <?php } else if ($comrow[3] == "text") { ?>
                                                <input type="text" id="textfield" class="col-10 ml-0 w-50 form-control" name="comvalues[]">
                                                <label class="d-none errmsg" id="txtmsg">Please Enter the text</label>
                                            <?php } else if ($comrow[3] == "date") { ?>
                                                    <input type="date" class="col-9 ml-0 w-50 form-control" id="bdate"  name="comvalues[]" min="<?php echo(date('Y-m-d')); ?>" max="">
                                                    <label class="d-none errmsg" id="datemsg">Please Enter the Date</label>
                                            <?php } else if ($comrow[3] == "time") { ?>
                                                        <input type="time" id="time" class="col-9 ml-0 w-50 form-control" name="comvalues[]">
                                                        <label class="d-none errmsg" id="timemsg">Please Enter the Time</label>
                                            <?php } else if ($comrow[3] == "radio")
                                                    {
                                                    $radio = explode(",", $comrow[2]);
                                                    for ($a = 0; $a < count($radio); $a++) { ?>
                                                    
                                              <div class="form-check form-check-inline ">
                                             
                                                <input type="radio" class="form-check-input" name="comvalues[]"
                                                   value="<?php echo $radio[$a] ?>" />
                                                   <label><?php echo $radio[$a] ?> </label>
                                             
                                             </div>  
                                            
                                            <?php } } ?>
                                        </div>
                                    </div>

                                <?php } ?>
                            </section>
                                <!-- common question end -->
                                <!-- specific value start -->
                               <section class="py-3">
                                <?php

                                $speQquery = "SELECT * FROM specificquestion where service_Id=$id";
                                $speQresult = mysqli_query($con, $speQquery);
                                while ($speQrow = mysqli_fetch_array($speQresult)) {

                                    ?>
                                    <div class="row mt-3">
                                        <div class="col-md-4">

                                            <input type="hidden" name="speQid[]" value="<?php echo $speQrow[0]; ?>"/>
                                            <h5><?php echo $speQrow[1]; ?></h5>
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                            $value = explode(",", $speQrow[2]);

                                            for ($i = 0; $i < count($value); $i++) {
                                            ?>
                                            <label>
                                                <input type="checkbox" name="speQvalue[]" value="<?php echo $value[$i]; ?>" />
                                                <label><?php echo $value[$i]; ?><label>
                                                    </label>

                                                <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                </section>
                            
                                <div class="text-end">
                                    <button type="submit" class="btn btl-lg allbtn">Submit</button></div>
                                </div>                                
                                             
                        </form>
                    </div>
                </div>
            </div>   
         
        </div>
   </section>



   <script src="./javascript/packagebookvaild.js"></script>
   <script src="./javascript/bootstrap.js"></script>
   <script src="./javascript/all.min.js"></script>
   

</body>

</html>


<?php include("./footer.php"); ?>