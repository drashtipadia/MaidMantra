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
    <title>Update Information</title>
</head>
<body>
    <?php
    $query = "SELECT * FROM information WHERE info_id=" . $_GET['id'];
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_row($result);
    //echo($row[1]);
    ?>
    <section class="py-5">
        <div class="container bg-light py-5">
            <div class="row m-5 ">
                <div class="col justify-content-around">
                    <div class="card ms-auto ">
                        <form method="POST"  id="updateinfoform"  action="./updateAdminServiceinfo1.php" enctype="multipart/form-data">
                            <div class=" form-floating m-3 border-3 ">
                                <input type="text" disabled class="form-control" value="<?php echo ($row[0]); ?>">
                                <input type="hidden" class="form-control" name="infoid" value="<?php  echo ($row[0]); ?>">
                                <label>Id</label>
                            </div>
                            <div class="form-floating m-3 border-3 ">
                                <input type="text" id="uptitle" name="uptitle" class="form-control"
                                    value="<?php echo ($row[1])?>">
                                <label id="updatetitlemsg">Title</label>
                            </div>
                            <div class="form-floating m-3  border-3 ">
                                <textarea class="form-control" id="descripition" name="descripition" rows="4" cols="50" value="<?php echo ($row[2]); ?>"><?php echo ($row[2]); ?></textarea>
                                <label id="updateinfomsg">Descritption</label>
                            </div>
                            <div class=" m-3  border-3 ">
                                <?php $image = ($row[3]);
                                ?>
                                <input type="checkbox" id="img" name="image" value="<?php echo ($image); ?>" checked>
                                <img class="mx-2" src="../images/<?php echo ($image); ?>" width="140px" height="100px">
                                <input type="file" id="img" name="updateimage" class="form-control-lg" value="" />
                                <label class="errmsg d-none" id="imgmsg">Please Select Image</label>
                            </div>
                            <div class="m-3  border-3">
                                <select class="form-select form-control-lg mb-3" name="Service"
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
                                    <label class="errmsg d-none" id="sermsg"> Please select service</label>
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
    <script src="./javascript/updateserviceinfo.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>
</html>
<?php
include("./footer.php");
?>