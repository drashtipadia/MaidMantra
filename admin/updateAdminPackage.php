<?php
include("./header.php");
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Package</title>

</head>

<body>
    <?php
    $upquery = "SELECT * FROM package WHERE p_id=".$_GET['pid'];
    $upresult = mysqli_query($con, $upquery);
    $row = mysqli_fetch_row($upresult);
    //echo($row[1]);
    ?>
    <section class="py-5">
        <div class="container bg-light py-5">
            <div class="row py-3">
                <div class="col text-center">
                    <h3>Update Package</h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="row m-5 ">
                <div class="col justify-content-around">
                    <div class="card ms-auto ">
                        <form method="POST" action="./updateAdminPackage1.php" enctype="multipart/form-data" id="updatepackage">

                            <div class="form-floating m-3 border-3 ">
                                <input type="text" disabled class="form-control" value="<?php echo ($row[0]); ?>">
                                <input type="hidden" class="form-control" name="pack_id" value="<?php echo ($row[0]); ?>">
                                <label>Id</label>
                            </div>

                            <div class="form-floating m-3 border-3 ">
                                <input type="text" id="pack_uptitle" name="pack_uptitle" class="form-control"  value="<?php echo ($row[1]); ?>">
                                <label id="packuptitlemsg">Title</label>

                            </div>
                            <div class="form-floating m-3  border-3 ">
                                <textarea class="form-control" id="pack_upinfo" name="pack_upinfo" rows="4" value="<?php echo ($row[2]); ?>"><?php echo ($row[2]); ?></textarea>
                                <label id="updateinfomsg">Descritption</label>
                            </div>
                            <div class=" m-3  border-3 ">

                                    <?php $image = ($row[3]);

                                    ?>
                                    <input type="checkbox" id="img" name="image" value="<?php echo ($image); ?>" checked>
                                    <img class="mx-2" src="../images/<?php echo ($image); ?>" width="140px" height="100px">
                                    <input type="file" id="uppackimage" name="uppackimage" class="form-control-lg" value="" />
                                    <label class="errmsg d-none" id="packimgmsg">Please Select Image</label>
                            </div>
                            <div class="m-3  border-3">
                                <select class="form-select form-control-lg mb-3" name="pack_upservice"
                                    aria-label="Default select example">
                                    <?php
                                    $serquery = "SELECT * from service";
                                    $serResult = mysqli_query($con, $serquery);
                                    while ($serRow = mysqli_fetch_row($serResult)) {
                                        if ($serRow[0] == $row[4]) { ?>
                                            <option selected value="<?php echo ($serRow[0]); ?>" id="service"><?php echo ($serRow[1]) ?>
                                            </option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo ($serRow[0]); ?>" id="service"><?php echo ($serRow[1]) ?></option>
                                        <?php }
                                    }
                                    ?>
                                    <label class="errmsg d-none" id="packsermsg"> Please select service</label>
                                </select>
                            </div>
                            <div class="m-3  border-3">
                                <button type="submit" class="btn btn-primary btn-block mb-4 w-25">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <script src="./javascript/updatepackage.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>

</html>
<?php
include("./footer.php");
?>