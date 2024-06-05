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

    <title>Package</title>
</head>

<body>




    <section id="FeedbacklistSection" class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Pacakge</h1>
        </div>
    </section>

    <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
        <a class="btn btn-dark w-25" href="./adminaddpackage.php">Add Pacakge</a>
    </div>


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
                    <h5>Information</h5>
                </div>
                <div class="col-2">
                    <h5>Image</h5>
                </div>
                <div class="col-1">
                    <h5>Service</h5>
                </div>

                <div class="col-1">
                    <h5>UPDATE</h5>
                </div>

                <div class="col-1">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>
    <?php
    $qur = "SELECT * FROM package";
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
                    <div class="col-2">
                    <?php
                        $file=($row[3]);  
                        ?>
                        <img class="mx-2" src="../images/<?php echo($file); ?>" width="80px" height="60px">
                    </div>
                    <div class="col-1">
                            <h5><?php 
                            $ser_query="SELECT * FROM service Where service_Id=".$row[4];
                            //echo $q;
                            $ser_res=mysqli_query($con,$ser_query);
                            $ser_row=mysqli_fetch_row($ser_res);
                            echo ($ser_row[1]); ?></h5>
                    </div>
                    <div class="col-1">
                        <h5><a href="./updateAdminPackage.php?pid=<?php echo ($row[0]) ?>">Update</a></h5>
                    </div>
                    <div class="col-1">
                        <a href="./deleteAdminPackage.php?pid=<?php echo ($row[0]) ?>"><i class="fa-solid fa-trash"></i></a>
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