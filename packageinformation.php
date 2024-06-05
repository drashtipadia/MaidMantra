<?php
include("./connection.php");
include("./header.php");
$pserid = $_GET['pid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.jpg" />

  <title>Package Information </title>
</head>

<body>
  <section class="py-5">

  </section>
  <?php
  $query = "SELECT * FROM package WHERE service_Id=$pserid";
  $res = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($res)) {
    ?>
    <div class="container ">
      <div class="row py-5">

      <div class="col-md-6">
          <div height="300px" width="400px">
            <img src="./images/<?php echo $row[3]; ?>" class="img-fluid h-100 w-100">
          </div>
        </div>
      

        <div class="col-md-6 maid-book">
          <h1><?php echo $row[1]; ?></h1>
          <span class="hrow"></span>
          <p></p>
          <?php if (isset($_SESSION['u_id'])) { ?>
            <a class="btn allbtn" href="./packagebooking.php?serid=<?php echo ($pserid); ?>&packid=<?php echo $row[0];?>" role="button">Book now</a>
          <?php } else { ?><a class="btn allbtn" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Book
              Now</a>
          <?php } ?>
        </div>

        </div>
       
    </div>
    <!-- header section end -->


    <!-- information section strat -->
    <div class="container">
      <div class="text-center">
        <h1>Information</h1>
        <span class="line"></span>
      </div>
      <!-- <p class="display-6"> </p>

      <p class="lead"></p>-->
      <div class="p-3">
      <p class="lead"><?php echo $row[2]; ?></p>
      </div>

    </div>

    <!-- information section end -->
  <?php } ?>
</body>
</html>
<?php include("./footer.php") ?>