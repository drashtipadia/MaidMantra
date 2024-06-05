<?php include("./header.php");
include("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="icon" href="./images/icon.png" />

    <title>User Profile</title>
</head>

<body>
    <section id="page-name">

        <div class="container h-200">
            <div class="row">
                <div class="col mt-5 text-center">
                    <h1>Booking Profile</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container bg-light py-5">

            <div class="row py-3">
                <div class="col text-center">
                    <h3>Service Booking </h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="row m-5 ">
                <!-- <div class="col"> -->
                <div class="card p-3">
                    <?php
                    // b_id,comQ_id_list,comQ_val_list,speQ_id_list,speQ_val_list,sal_id,maid_id,ID,  8          
                    //card_name,card_number,card_cvv,card_expiredate,bookingdate,status,amount,service_id,   8
                    //maid_id,maid_name,maid_age,maid_gender,maid_number,maid_picture,maid_status,service_id,  8
                    //sal_id,hours,salary,  3
                    //ID,name,number,email,gender,password  6
                    //service_id,service_name  2
                    $query = "SELECT * FROM booking,maids,salary,user,service WHERE
                                                booking.maid_id=maids.maid_id and
                                                booking.sal_id=salary.sal_id and
                                                booking.ID=user.ID and
                                                booking.service_Id=service.service_id and 
                                                booking.ID='" . $_SESSION['u_id'] . "';";

                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($res)) {
                        ?>
                        <div class="card-header mt-3">
                            <h3><?php echo $row[34]; ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-6 col-md-12  mt-3">
                                    <h4 class="text-center py-2 bg-light">Maid Details</h4>
                                    <div class="row p-1">
                                        <div class="col-6">
                                            <div class="row">
                                                <h5>Maid Name:</h5>
                                            </div>
                                            <div class="row">
                                                <h5>Maid Age:</h5>
                                            </div>
                                            <div class="row">
                                                <h5>Maid Gender:</h5>
                                            </div>
                                            <div class="row">
                                                <h5>Maid Number:</h5>
                                            </div>
                                            <div class="row">
                                                <h5>Maid Picture:</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <h5><?php echo $row[17]; ?></h5>
                                            </div>
                                            <div class="row">
                                                <h5><?php echo $row[18]; ?></h5>
                                            </div>
                                            <div class="row">
                                                <h5><?php echo $row[19]; ?></h5>
                                            </div>
                                            <div class="row">
                                                <h5><?php echo $row[20]; ?></h5>
                                            </div>
                                            <div class="row">
                                                <div width="50px" height="50px"><img src="./images/<?php echo $row[21]; ?>"
                                                        class="img-fluid" width="100" height="100" /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 mt-3">
                                    <h4 class="text-center py-2 bg-light">Service Details</h4>
                                    <div class="row p-1">

                                        <!-- salary/hours -->
                                        <?php $salquery = "SELECT * FROM salary WHERE sal_id=$row[5]";
                                        $salres = mysqli_query($con, $salquery);
                                        while ($salrow = mysqli_fetch_array($salres)) { ?>
                                            <div class="col-6">
                                                <div class="row">
                                                    <h5> Hours: </h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Salary: </h5>
                                                </div>

                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <h5><?php echo $salrow[1]; ?> </h5>
                                                </div>
                                                <div class="row">
                                                    <h5><?php echo $salrow[2]; ?> </h5>
                                                </div>
                                            </div>

                                        <?php } ?>


                                        <?php
                                        $comans = explode(",", $row[2]);
                                        $comvalQ = "SELECT * FROM commonquestion";
                                        $comvalR = mysqli_query($con, $comvalQ); ?>


                                        <div class="col-6">
                                            <?php
                                            while ($comvalrow = mysqli_fetch_array($comvalR)) { ?>
                                                <div class="row">
                                                    <h5><?php echo $comvalrow[1]; ?> : </h5>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <div class="col-6">
                                            <?php
                                            for ($i = 0; $i < count($comans); $i++) { ?>
                                                <div class="row">
                                                    <h5> <?php echo $comans[$i]; ?></h5>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- Common Question Answer End -->

                                    <!-- Specific Question Answer start -->
                                    <?php
                                    $serid = $row[15];

                                    $speans = explode(",", $row[4]);
                                    $spevalQ = "SELECT * FROM specificquestion WHERE service_Id=$serid";
                                    $spevalR = mysqli_query($con, $spevalQ); ?>

                                    <div class="row p-1">
                                        <div class="col-6">
                                            <?php
                                            while ($spevalrow = mysqli_fetch_array($spevalR)) { ?>
                                                <div class="row">
                                                    <h5><?php echo $spevalrow[1]; ?> : </h5>
                                                </div>
                                            <?php } ?>

                                        </div>
                                        <div class="col-6">
                                            <?php
                                            for ($i = 0; $i < count($speans); $i++) { ?>
                                                <div class="row">
                                                    <h5> <?php echo $speans[$i]; ?></h5>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                        <!-- Specific Question Answer End -->

                                        <?php if ($row[13] == "Done") { ?>

                                            <div class="col-6">
                                                <div class="row">
                                                    <h5> Paid Amount: </h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <h5><?php echo $row[14]; ?> </h5>
                                                </div>

                                            </div>

                                        <?php } ?>
                                    </div>



                                </div>

                                <!-- Payment start -->
                                <?php

                                // echo $row[0]; //12
                                //echo $row[15];
                                $salAmountQuery = "SELECT * FROM salary WHERE sal_id=$row[5]";
                                $salAResult = mysqli_query($con, $salAmountQuery);
                                while ($salArow = mysqli_fetch_array($salAResult)) {
                                    $tsalary = $salArow[2];
                                    // echo $tsalary;
                                }
                                //  number of days count
                                $comid = "SELECT que_id FROM commonquestion WHERE que_description='Days'";
                                $comres = mysqli_query($con, $comid);
                                while ($comidrow = mysqli_fetch_array($comres)) {
                                    $dayid = $comidrow[0];
                                }
                                //echo $dayid; //4
                                $comQidlist = explode(",", $row[1]);
                                for ($i = 0; $i < count($comQidlist); $i++) {
                                    if ($dayid == $comQidlist[$i]) {
                                        $dayvalueid = $i;
                                    }
                                }
                                //echo $dayvalueid;
                                $comQvaluelist = explode(",", $row[2]);
                                $totalday = $comQvaluelist[$dayvalueid];


                                //cooking person count
                                $cookq = "SELECT service_Id FROM service WHERE service_name='Cooking' and service_Id=$row[15]";
                                $cookres = mysqli_query($con, $cookq);

                                if (mysqli_num_rows($cookres)) {
                                    $personQuery = "SELECT speQ_id FROM specificquestion WHERE speQ_name='Person'";
                                    $personres = mysqli_query($con, $personQuery);
                                    while ($personidrow = mysqli_fetch_array($personres)) {
                                        $personid = $personidrow[0];
                                    }
                                    //echo $dayid; //4
                                    $speQidlist = explode(",", $row[3]);
                                    for ($i = 0; $i < count($speQidlist); $i++) {
                                        if ($personid == $speQidlist[$i]) {
                                            $personvalueid = $i;
                                        }
                                    }
                                    //echo $personvalueid;
                                    $speQvaluelist = explode(",", $row[4]);
                                    $totalperson = $speQvaluelist[$personvalueid];

                                    //echo  $totalperson;
                                    $totalamount = $tsalary * $totalday * $totalperson;

                                } else {
                                    $totalamount = $tsalary * $totalday;

                                }

                                ?>
                                <!-- payment  end -->

                                <div class="card-footer p-3">
                                    <?php if ($row[13] == "approved") {
                                        ?>
                                        <h6>Total Amount:<?php echo $totalamount; ?></h6>
                                        <p class="errmsg">You have must 30% amount pay..</p>
                                        <a href="./paymentform.php?bookingid=<?php echo $row[0]; ?>" class="btn allbtn">Pay to
                                            Procedure</a>
                                        <a href="./bookingdelete.php?bookingid=<?php echo $row[0]; ?>" class="btn allbtn"
                                            onclick="return confirm('Are you sure you want to delete this booking?');">Cancel</a>

                                    <?php } else if ($row[13] == "Done") { ?>
                                            <h5>Done</h5>
                                    <?php } else {
                                        echo "Pending";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>












            <div class="row py-3">
                <div class="col text-center">
                    <h3>Package Booking</h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="row m-5 ">
                <!-- <div class="col"> -->
                <div class="card p-3">
                    <?php
                    // pb_id,pcomq_ids,pcomq_values,pspeq_ids,pspeq_values,month,sal_id,maid_id,ID,  9          
                    //p_cardname,p_cardnumber,p_cardcvv,p_cardexpiry,pbookingdate,p_status,p_amount,p_id,   8
                    //maid_id,maid_name,maid_age,maid_gender,maid_number,maid_picture,maid_status,service_id,  8
                    //sal_id,hours,salary,  3
                    //ID,name,number,email,gender,password  6
                    //p_id,p_title,p_info,p_image,service_id 5
                    //service_id,service_name  2
                    $pquery = "SELECT * FROM packagebooking,maids,salary,user,package,service WHERE
                                                packagebooking.maid_id=maids.maid_id and
                                                packagebooking.sal_id=salary.sal_id and
                                                packagebooking.ID=user.ID and
                                                packagebooking.p_id=package.p_id and 
                                                package.service_Id=service.service_Id and
                                                packagebooking.ID='" . $_SESSION['u_id'] . "';";

                    $pres = mysqli_query($con, $pquery);
                    if (mysqli_num_rows($pres) == 0) {
                        echo "<h3 class='text-center'>No Pacakge Booked</h3>";
                    } else {
                        while ($prow = mysqli_fetch_array($pres)) {
                            ?>
                            <div class="card-header mt-3">
                                <h3><?php echo $prow[35]; ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6 col-md-12  mt-3">
                                        <h4 class="text-center py-2 bg-light">Maid Details</h4>
                                        <div class="row p-1">
                                            <div class="col-6">
                                                <div class="row">
                                                    <h5>Maid Name:</h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Maid Age:</h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Maid Gender:</h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Maid Number:</h5>
                                                </div>
                                                <div class="row">
                                                    <h5>Maid Picture:</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <h5><?php echo $prow[18]; ?></h5>
                                                </div>
                                                <div class="row">
                                                    <h5><?php echo $prow[19]; ?></h5>
                                                </div>
                                                <div class="row">
                                                    <h5><?php echo $prow[20]; ?></h5>
                                                </div>
                                                <div class="row">
                                                    <h5><?php echo $prow[21]; ?></h5>
                                                </div>
                                                <div class="row">
                                                    <div width="50px" height="50px"><img src="./images/<?php echo $prow[22]; ?>"
                                                            class="img-fluid" width="100" height="100" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 mt-3">
                                        <h4 class="text-center py-2 bg-light">Service Details</h4>
                                        <div class="row p-1">

                                            <!-- salary/hours -->
                                            <?php $psalquery = "SELECT * FROM salary WHERE sal_id=$prow[6]";
                                            $psalres = mysqli_query($con, $psalquery);
                                            while ($psalrow = mysqli_fetch_array($psalres)) { ?>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <h5> Hours: </h5>
                                                    </div>
                                                    <div class="row">
                                                        <h5>Salary: </h5>
                                                    </div>
                                                    <div class="row">
                                                        <h5> Month: </h5>
                                                    </div>

                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <h5><?php echo $psalrow[1]; ?> </h5>
                                                    </div>
                                                    <div class="row">
                                                        <h5><?php echo $psalrow[2]; ?> </h5>
                                                    </div>
                                                    <div class="row">
                                                        <h5><?php echo $prow[5] . " Month"; ?> </h5>
                                                    </div>
                                                </div>

                                            <?php } ?>


                                            <?php
                                            $pcomans = explode(",", $prow[2]);
                                            $pcomvalQ = "SELECT * FROM commonquestion WHERE que_description!='Days'";
                                            $pcomvalR = mysqli_query($con, $pcomvalQ); ?>


                                            <div class="col-6">
                                                <?php
                                                while ($pcomvalrow = mysqli_fetch_array($pcomvalR)) { ?>
                                                    <div class="row">
                                                        <h5><?php echo $pcomvalrow[1]; ?> : </h5>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                            <div class="col-6">
                                                <?php
                                                for ($i = 0; $i < count($pcomans); $i++) { ?>
                                                    <div class="row">
                                                        <h5> <?php echo $pcomans[$i]; ?></h5>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                        </div>

                                        <!-- Common Question Answer End -->

                                        <!-- Specific Question Answer start -->
                                        <?php
                                        $pserid = $prow[15];

                                        $pspeans = explode(",", $prow[4]);
                                        $pspevalQ = "SELECT * FROM specificquestion WHERE service_Id=$prow[38]";
                                        $pspevalR = mysqli_query($con, $pspevalQ); ?>

                                        <div class="row p-1">
                                            <div class="col-6">
                                                <?php
                                                while ($pspevalrow = mysqli_fetch_array($pspevalR)) { ?>
                                                    <div class="row">
                                                        <h5><?php echo $pspevalrow[1]; ?> : </h5>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                            <div class="col-6">
                                                <?php
                                                for ($i = 0; $i < count($pspeans); $i++) { ?>
                                                    <div class="row">
                                                        <h5> <?php echo $pspeans[$i]; ?></h5>
                                                    </div>
                                                <?php }
                                                ?>
                                            </div>
                                            <!-- Specific Question Answer End -->
                                            <?php if ($prow[14] == "Done") { ?>

                                                <div class="col-6">
                                                    <div class="row">
                                                        <h5> Paid Amount: </h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <h5><?php echo $prow[15]; ?> </h5>
                                                    </div>

                                                </div>

                                            <?php } ?>
                                        </div>





                                    </div>

                                    <!-- Payment start -->
                                    <?php

                                    // echo $row[0]; //12
                                    //echo $prow[6];
                                    $psalAmountQuery = "SELECT * FROM salary WHERE sal_id=$prow[6]";
                                    $psalAResult = mysqli_query($con, $psalAmountQuery);
                                    while ($psalArow = mysqli_fetch_array($psalAResult)) {
                                        $ptsalary = $psalArow[2];
                                    }
                                    $mday = 0;
                                    //  number of days count
                                    if ($prow[5] == '1') {
                                        $mday = 30;

                                    } else if ($prow[5] == '2') {
                                        $mday = 60;


                                    } else if ($prow[5] == '3') {
                                        $mday = 90;
                                    }
                                    //echo $mday;
                                    //cooking person count
                                    $pcookq = "SELECT service_Id FROM service WHERE service_name='Cooking' and service_Id=$prow[38]";
                                    $pcookres = mysqli_query($con, $pcookq);

                                    if (mysqli_num_rows($pcookres)) {
                                        $packpersonQuery = "SELECT speQ_id FROM specificquestion WHERE speQ_name='Person'";
                                        $packpersonres = mysqli_query($con, $packpersonQuery);
                                        while ($packpersonidrow = mysqli_fetch_array($packpersonres)) {
                                            $packpersonid = $packpersonidrow[0];
                                        }
                                        //echo $dayid; //4
                                        $pspeQidlist = explode(",", $prow[3]);
                                        for ($i = 0; $i < count($pspeQidlist); $i++) {
                                            if ($packpersonid == $pspeQidlist[$i]) {
                                                $packpersonvalueid = $i;
                                            }
                                        }
                                        //echo $personvalueid;
                                        $pspeQvaluelist = explode(",", $prow[4]);
                                        $packtotalperson = $pspeQvaluelist[$packpersonvalueid];

                                        //echo  $totalperson;
                                        $packtotalamount = $ptsalary * $mday * $packtotalperson;
                                        $discount = $packtotalamount - $packtotalamount / 100 * 10;
                                        // echo "per person count";
                                    } else {

                                        $packtotalamount = $ptsalary * $mday;
                                        $discount = $packtotalamount - $packtotalamount / 100 * 10;
                                    }

                                    ?>
                                    <!-- payment  end -->

                                    <div class="card-footer p-3">
                                        <?php if ($prow[14] == "approved") {
                                            ?>
                                            <h6>Total Amount:<?php echo $packtotalamount; ?></h6>
                                            <h5>10% Discount total=<?php echo $discount; ?></h5>
                                            <p class="errmsg">You have must 30% amount pay..</p>
                                            <a href="./packagepaymentform.php?packid=<?php echo $prow[0]; ?>" class="btn allbtn">Pay
                                                to
                                                Procedure</a>
                                            <a href="./packagedelete.php?packid=<?php echo $prow[0]; ?>" class="btn allbtn"
                                                onclick="return confirm('Are you sure you want to delete this booking?');">Cancel</a>

                                        <?php } else if ($prow[14] == "Done") { ?>
                                                <h5>Done</h5>
                                        <?php } else {
                                            echo "Pending";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>



        </div>
    </section>
    <script src="./javascript/Userprofilevalidation.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>

</body>

</html>
<?php include("./footer.php"); ?>