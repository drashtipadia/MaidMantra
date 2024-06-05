<?php
include("./connection.php");
include("./header.php");
$id = $_GET['serviceid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.jpg" />

  <title>Service </title>
</head>

<body>
  <section class="py-5">

  </section>
  <?php
  $query = "SELECT * FROM information WHERE service_Id=$id";
  $res = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($res)) {
    ?>
    <div class="container ">
      <div class="row py-5">
        <div class="col-md-6 maid-book">
          <h1><?php echo $row[1]; ?></h1>
          <span class="hrow"></span>
          <p></p>
          <?php if (isset($_SESSION['u_id'])) { ?>
            <a class="btn allbtn" href="./userbookingform.php?serid=<?php echo ($id); ?>" role="button">Book now</a>
          <?php } else { ?><a class="btn allbtn" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Book
              Now</a>
          <?php } ?>
        </div>


        <div class="col-md-6">
          <div height="300px" width="400px">
            <img src="./images/<?php echo $row[3]; ?>" class="img-fluid">
          </div>
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