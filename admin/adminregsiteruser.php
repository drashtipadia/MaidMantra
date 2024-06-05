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
    <link rel="stylesheet" href="./css/style.css" />

    <title>Register User</title>
</head>

<body>

  <section id="ReguserlistSection" class="mt-5">
    <div class="container d-flex justify-content-center">
      <h1 class="m-auto">Register User</h1>
    </div>
  </section>
 

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <h5> ID</h5>
                </div>
                <div class="col-2">
                    <h5>NAME</h5>
                </div>
                <div class="col-2">
                    <h5>NUMBER</h5>
                </div>
                <div class="col-3">
                    <h5>EMAIL</h5>
                </div>
                <div class="col-1">
                    <h5>GENDER</h5>
                </div>
                <div class="col-2">
                    <h5>PASSWORD</h5>
                </div>
                <div class="col-1">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>

    <?php

    $query = "SELECT * FROM user";

    $result = mysqli_query($con, $query);

    while ($rows = mysqli_fetch_row($result)) {
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-1">
                        <h5> <?php echo ($rows[0]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($rows[1]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($rows[2]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($rows[3]) ?></h5>
                    </div>
                    <div class="col-1">
                        <h5> <?php echo ($rows[4]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($rows[5]) ?></h5>
                    </div>
                    <div class="col-1">
                        <a href="./deleteAdminReguser.php?us_id=<?php echo ($rows[0]); ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>
                    <hr />
                </div>
            </div>
        </section>
    <?php } ?>

    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>

</html>
<?php include("./footer.php") ?>