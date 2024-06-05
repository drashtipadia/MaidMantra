<?php
include("./header.php");
$bid = $_GET['bookingid'];
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

    <title>Payment</title>
</head>

<body>
    <div class="mt-5"></div>
    <section class="py-5">
        <div class="container booking py-5">

            <div class="row py-3">
                <div class="col text-center">
                    <h3>Payment </h3>
                    <span class="line"></span>
                </div>
            </div>
            <?php
            // b_id,comQ_id_list,comQ_val_list,speQ_id_list,speQ_val_list,sal_id,maid_id,ID,  8          
            //card_name,card_number,card_cvv,card_expiredate,bookingdate,status,amount,service_id,   8
            //sal_id,hours,salary,  3
            $query = "SELECT * FROM booking,salary WHERE booking.sal_id= salary.sal_id and booking.b_id=$bid";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
                // echo $row[0]; //12
                //echo $row[15];
                $salQuery = "SELECT * FROM salary WHERE sal_id=$row[5]";
                $salResult = mysqli_query($con, $salQuery);
                while ($salrow = mysqli_fetch_array($salResult)) {
                    $tsalary = $salrow[2];
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
                    $payamount = ($totalamount * 30) / 100;
                } else {
                    $totalamount = $tsalary * $totalday;
                    $payamount = ($totalamount * 30) / 100;
                }
            }

            ?>
            <div class="card m-5">
                <div class="row m-5">
                    <div class="col m-0 p-0">

                        <p>TOTAL AMOUNT: <?php echo $totalamount;
                        ?></p>
                        <p>Pay Amount:<?php echo $payamount ?></p>
                        <form method="post" action="./insertPayment.php" id="paymentform">
                            <input type="hidden" name="bookingid" value="<?php echo $bid; ?>" />
                            <input type="hidden" name="Pay_amount" value="<?php echo $payamount; ?>"/>
                            <div class="card px-4">
                                <h6 class="h8 py-3">Payment Details</h6>
                                <div class="row gx-3">
                                    <div class="col-12">
                                        <div class="d-flex flex-column">
                                            <p class="text mb-1">Card Holder Name</p>
                                            <input class="form-control mb-2" type="text" name="cardholdername" id="cardholdername" placeholder="Name">
                                            <label for="cardnamemsg" id="cardnamemsg" class=" d-none errmsg form-label">Card Holder Name is Required</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex flex-column">
                                            <p class="text mb-1">Card Number</p>
                                            <input class="form-control mb-2" type="text" name="cardnumber" id="cardnumber" placeholder="1234 5678 435678">
                                            <label for="cardnumbermsg" id="cardnumbermsg" class=" d-none errmsg form-label">Card Number is Required</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <p class="text mb-1">Expiry</p>
                                            <input class="form-control mb-2" type="date" name="cardexpiry" id="cardexpiry" placeholder="MM/YYYY" min="<?php echo(date('Y-m-d')); ?>" max="" >
                                            <label for="carddatemsg" id="carddatemsg" class=" d-none errmsg form-label">Expiry date is Required</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex flex-column">
                                            <p class="text mb-1">CVV/CVC</p>
                                            <input class="form-control mb-2 pt-2 " name="cardcvv" id="cardcvv" type="password" placeholder="***" maxlength="3">
                                            <label for="carcvvmsg" id="cardcvvmsg" class=" d-none errmsg form-label">CVV is Required</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                       
                                        <input type="submit" class="btn btn-primary mb-3 w-25"  value="Pay <?php echo $payamount; ?>"/>

                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row d-flex justify-content-center">
                        </div>
                    </div>
                </div>


            </div>
    </section>



    <script src="./javascript/paymentvalidation.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>

</body>

</html>


<?php include("./footer.php"); ?>