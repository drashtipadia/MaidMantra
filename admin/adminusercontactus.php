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

    <title>Contact user</title>
</head>

<body>
    
  <section id="usercontactlistSection" class="mt-5">
    <div class="container d-flex justify-content-center">
      <h1 class="m-auto">User Contact Us</h1>
    </div>
  </section>

    <section class="py-5">
        <div class="container text-center">
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
                <div class="col-1">
                    <h5>Aria</h5>
                </div>
                <div class="col-2">
                    <h5>Time</h5>
                </div>
                <div class="col-2">
                    <h5>Service</h5>
                </div>
                <div class="col-1">
                    <h5>DELETE</h5>
                </div>



                <hr />
            </div>
        </div>
    </section>
    <?php
    $qur = "SELECT * FROM contactuser";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container text-center">
                <div class="row">
                    <div class="col-1">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[2]) ?></h5>
                    </div>
                    <div class="col-1">
                        <h5> <?php echo ($row[3]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[4]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5><?php
                        $ser_query = "SELECT * FROM service Where service_Id=" . $row[5];
                        //echo $q;
                        $ser_res = mysqli_query($con, $ser_query);
                        $ser_row = mysqli_fetch_row($ser_res);
                        echo ($ser_row[1]); ?></h5>
                    </div>
                    <div class="col-1">
                    <a href="./deleteAdminContacts.php?contactuser_id=<?php echo ($row[0]); ?>"><i class="fa-solid fa-trash"></i></a>
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