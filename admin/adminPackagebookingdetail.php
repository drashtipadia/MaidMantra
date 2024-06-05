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

  <title>Package Booking Details</title>
</head>

<body>
  <section>
    <div class="container p-5 bg-light">
      <div class="row py-3 g-3">
        <div class="col text-center">
          <h3>Package Booking</h3>
        </div>
      </div>
      <div class="row p-3">

        <?php
        //pb_id,pcomq_ids,pcomq_values,pspeq_ids,pspeq_values,month,sal_id,maid_id,ID,  9          
        //p_cardname,p_cardnumber,p_cardcvv,p_cardexpiry,pbookingdate,p_status,p_amount,p_id,   8
        //maid_id,maid_name,maid_age,maid_gender,maid_number,maid_picture,maid_status,service_id,  8 
        //ID,name,number,email,gender,password  6
        //p_id,p_title,p_info,p_image,service_id 5
        
        $query = "SELECT * FROM packagebooking,maids,user,package WHERE
                    packagebooking.maid_id=maids.maid_id and
                    packagebooking.ID=user.ID and
                    packagebooking.p_id=package.p_id ORDER BY packagebooking.pbookingdate DESC;
                    ";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($res)) {
          ?>
          <div class="col-6 p-2">
            <div class="card">
              <div class="card-header">
                <h4><?php echo $row[26]; ?>
                  (<?php if ($row[14] == "Done") {
                    echo "Paid";
                  } else {
                    echo "Pending";
                  }
                  ?>)</h4>
              </div>
              <div class="card-body">
                <h5 class="card-title"></h5>
                <h6>Package: <?php echo $row[32]; ?></h6>
                </h5>
                <p class="card-text">Booking Date: <?php echo date('d/m/Y', strtotime($row[13])) ?></p>
                <p class="card-text">Maid: <?php echo $row[18]; ?></p>
                <a href="./packbookfulldetails.php?packid=<?php echo $row[0]; ?>">Details</a>
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