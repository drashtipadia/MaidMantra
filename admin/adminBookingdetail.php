<?php

include("../connection.php");
include("./header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/all.min.css" />
  

  <title>Booking Details</title>
</head>

<body>
  <section>
    <div class="container p-5 bg-light">
      <div class="row py-3 g-3">
        <div class="col text-center">
          <h3>Service Booking</h3>
        </div>
      </div>
      <div class="row p-3">

        <?php
        // b_id,comQ_id_list,comQ_val_list,speQ_id_list,speQ_val_list,sal_id,maid_id,ID, //8
        //card_name,card_number,card_cvv,card_expiredate,bookingdate,status,amount,service_id //8
        //maid_id,maid_name,maid_age,maid_gender,maid_number,maid_picture,maid_status,service_id //8
        //ID,name,number,email,gender,password  //6
        //service_id,service_name //2
        $query = "SELECT * FROM booking,maids,user,service WHERE
                    booking.maid_id=maids.maid_id and
                    booking.ID=user.ID and
                    booking.service_Id=service.service_id ORDER BY booking.bookingdate DESC";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($res)) {
          ?>
          <div class="col-6 p-2">
            <div class="card">
              <div class="card-header">

                <h4><?php echo $row[25]; ?>
                  (<?php if ($row[13] == "Done") {
                    echo "Paid";
                  } else {
                    echo "Pending";
                  }
                  ?>)

                </h4>
              </div>
              <div class="card-body">
                <h5 class="card-title"></h5>
                <h6>Service: <?php echo $row[31]; ?></h6>
                </h5>
                
                <p class="card-text">Booking Date: <?php echo date('d/m/Y', strtotime($row[12])) ;?></p>
                <p class="card-text">Maid: <?php echo $row[17]; ?></p>
                <a href="./bookingfulldetails.php?bookingid=<?php echo $row[0]; ?>">Details</a>
              </div>

            </div>

          </div>
        <?php } ?>
      </div>

    </div>
  </section>

  <script src="./javascript/bootstrap.js"></script>
  <script src="./javascript/all.min.js"></script>
</body>

</html>

<?php include("./footer.php") ?>