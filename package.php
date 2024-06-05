<?php include("./header.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.jpg" />
  <title>Package</title>
</head>
<body>
  <div class="container py-5">
    <div class="row py-5 g-3">
      <div class="col text-center">
        <h3>our package offers </h3>
        <span class="line"></span>
      </div>
    </div>
    <?php $query="SELECT * FROM package";
          $result=mysqli_query($con,$query);
    ?>
    <div class="row">
      <?php while($row=mysqli_fetch_array($result))
      { ?>
      <div class="col-lg-3">
        <div class="card w-100 h-100">
          <img src="./images/<?php echo $row[3];?>" class="card-img-top" alt="..." height="189px">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row[1]; ?></h5>
            <a href="./packageinformation.php?pid=<?php echo $row[0];?>" class="btn allbtn w-100">View Pricing</a>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>

</body>
</html>
<?php include("./footer.php") ?>