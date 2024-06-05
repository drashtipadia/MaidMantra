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

    <title>Service Information</title>
</head>

<body>

    <section class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Service Information</h1>
        </div>
    </section>
    <section>
        <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
            <a class="btn btn-dark w-25" href="./adminAddServiceInfo.php">Add New Information</a>
        </div>
    </section>
    <section class="py-3">
        <div class="container">
            <div class="row ">
                <div class="col-1">
                    <h5> ID</h5>
                </div>
                <div class="col-2">
                    <h5>Title</h5>

                </div>
                <div class="col-4">
                    <h5>Details</h5>
                </div>
                <div class="col-1">
                    <h5>Image</h5>
                </div>

                <div class="col-2">
                    <h5>Serivce</h5>
                </div>
                <div class="col-1">
                    <h5>Update</h5>
                </div>
                <div class="col-1">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>
    <?php
    $qur = "SELECT * FROM information";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container">
                <div class="row justify-content-center" id="editRowCommonQuestion<?php echo ($row[0]); ?>">
                    <div class="col-1">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-4">
                        <h5> <?php echo ($row[2]) ?></h5>
                    </div>
                    <div class="col-1">
                        <?php
                        $file = ($row[3]);
                        ?>
                        <img class="mx-2" src="../images/<?php echo ($file); ?>" width="80px" height="60px">
                    </div>
                    <div class="col-2">
                        <h5> <?php
                        $ser_query = "SELECT * FROM service Where service_Id=" . $row[4];
                        $ser_res = mysqli_query($con, $ser_query);
                        $ser_row = mysqli_fetch_row($ser_res);
                        echo ($ser_row[1]); ?>
                        </h5>
                    </div>
                    <div class="col-1">
                        <h5><a href="./updateAdminServiceinfo.php?id=<?php echo $row[0]; ?>">Update</a></h5>
                    </div>
                    <div class="col-1">
                        <a href="./deleteAdminserviceinfo.php?id=<?php echo $row[0]; ?>"><i class="fa-solid fa-trash"></i></a>
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