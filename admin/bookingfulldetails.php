<?php

include("../connection.php");
include("./header.php");
$id = $_GET['bookingid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/all.min.css" />

    <title>Home</title>
</head>

<body>
    <section class="py-5">
        <div class="container bg-light py-5">

            <div class="row py-3">
                <div class="col text-center">
                    <h3>Full Details</h3>
                    <span class="line"></span>
                </div>
            </div>
            <?php
           
            // b_id,comQ_id_list,comQ_val_list,speQ_id_list,speQ_val_list,sal_id,maid_id,ID,  8          
            //card_name,card_number,card_cvv,card_expiredate,bookingdate,status,Amount,service_id,   8
            //maid_id,maid_name,maid_age,maid_gender,maid_number,maid_picture,maid_status,service_id,  8
            //sal_id,hours,salary,  3
            //ID,name,number,email,gender,password  6
            //service_id,service_name  2
            $query = "SELECT * FROM booking,maids,salary,user,service WHERE
                            booking.maid_id=maids.maid_id and
                            booking.sal_id=salary.sal_id and
                            booking.ID=user.ID and
                            booking.service_Id=service.service_id and
                            booking.b_id=$id;
                            ";
            $res = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($res)) {
                ?>
                <div class="row m-5 ">
                    <div class="col justify-content-around">
                        <div class="card ms-auto ">

                            <div class="card-header">
                                <div class="row">
                                    <div class="col-10">
                                        <h3><?php echo $row[28]; ?></h3>
                                    </div>
                                   <div class="col-2 text-end">
                                      <a href="deleteAdminbooking.php?bookingid=<?php echo $row[0] ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <h5>Service :</h5>
                                    </div>
                                    <div class="col-6"> 
                                       <h5><?php echo $row[34]; ?></h5>
                                    </div>
                                    <div class="col-4">
                                         <h5>Maid name :</h5>
                                    </div>
                                    <div class="col-6"> 
                                        <h5><?php echo $row[17]; ?></h5>
                                    </div>
                                    <!-- Common Question Answer start -->
                                    <?php
                                    $comans = explode(",", $row[2]);
                                    $comvalQ = "SELECT * FROM commonquestion";
                                    $comvalR = mysqli_query($con, $comvalQ); ?>


                                    <div class="col-4">
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

                                <div class="row">
                                    <div class="col-4">
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
                                </div>
                            
                                <?php if($row[13]=="Done"){?>
                                    <div class="row">
                                        <div class="col-4"><h5> Paid Amount: </h5></div>   
                                        <div class="col-6"><h5><?php echo $row[14];?></h5></div>
                                    </div>
                                <?php } ?>
                            </div>
                            
                            <div class="card-footer">
                                <?php
                                if($row[13] == "approved" || $row[13] == "Done")
                                {
                                    echo "confirm";
                                }
                                else{?>
                                <form method="post" class="text-end" action="./updatebookstatus.php">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                    <input type="hidden" name="status" value="approved" />
                                    <input type="submit" class="btn btn-primary btn-lg" value="approved" />
                                </form>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>

</html>

<?php include("./footer.php") ?>