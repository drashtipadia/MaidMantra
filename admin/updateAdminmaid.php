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
    <title>Update Maid</title>

</head>

<body>

    <?php
    $upquery = "SELECT * FROM maids WHERE maid_id=" . $_GET['m_id'];
    $upresult = mysqli_query($con, $upquery);
    $row = mysqli_fetch_row($upresult);
    //echo($row[1]);
    ?>

    <section class="py-5">
        <div class="container bg-light py-5">

            <div class="row m-5 ">
                <div class="col justify-content-around">
                    <div class="card ms-auto ">
                        <form method="POST" id="updatemaid" action="./updateAdminmaid1.php" enctype="multipart/form-data">

                            <div class=" form-floating m-3 border-3 ">
                                <input type="text" disabled class="form-control" value="<?php echo ($row[0]); ?>">
                                <input type="hidden" class="form-control" name="maidid" value="<?php echo ($row[0]); ?>">
                                <label>Id</label>
                            </div>
                            <div class="form-floating m-3 border-3 ">
                                <input type="text" id="m_name" name="m_name" class="form-control"
                                    value="<?php echo ($row[1]); ?>">
                                <label id="mnamemsg" class="">Name</label>
                            </div>
                            <div class="form-floating m-3  border-3 ">
                                <input type="text" id="m_age" name="m_age" class="form-control"
                                    value="<?php echo ($row[2]); ?>">
                                <label id="magemsg" class="">Age</label>
                            </div>
                            <div class=" m-3  border-3 ">
                                <label for="user_gender">Gender : </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                                        >
                                    <label class="form-check-label" for="Male">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="female" checked>
                                    <label class="form-check-label" for="Female">Female</label>
                                </div>
                            </div>
                            <div class="form-floating m-3  border-3 ">
                                <input type="text" id="m_number" name="m_number" class="form-control"
                                    value="<?php echo ($row[4]); ?>">
                                <label id="mnumbermsg">Number</label>
                            </div>
                            <div class=" m-3  border-3 ">

                                <?php $image = ($row[5]);

                                ?>
                                <input type="checkbox" id="image1" name="image" value="<?php echo ($image); ?>" checked>
                                <img class="mx-2" src="../images/<?php echo ($image); ?>" width="140px" height="100px">
                                <input type="file" id="image1" name="image1" class="form-control-lg" placeholder="First Image">
                                <label id="mimagemsg" class="d-none errmsg">Please select the image</label>
                            </div>

                            <div class=" m-3  border-3 ">
                                <select class="form-select form-control-lg mb-3" name="status" aria-label="Default
                                    select example">
                                    <option value="Availble" checked>Availble</option>
                                    <option value="Booked">Booked</option>
                                    <option value="Not Availble">Not Availble</option>
                                </select>

                            </div>
                            <div class="m-3  border-3">
                                <select class="form-select form-control-lg mb-3" name="Service"
                                    aria-label="Default select example">
                                    <?php
                                    $serquery = "SELECT * from service";
                                    $serResult = mysqli_query($con, $serquery);
                                    while ($serRow = mysqli_fetch_row($serResult)) {
                                        if ($serRow[0] == $row[7]) { ?>
                                            <option selected value="<?php echo ($serRow[0]); ?>"><?php echo ($serRow[1]) ?>
                                            </option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo ($serRow[0]); ?>"><?php echo ($serRow[1]) ?></option>
                                        <?php }
                                    }
                                    ?>
                                </select>
                                <label id="mservicemsg" class="d-none errmsg"> Please select the service</label>
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

    <script src="./javascript/updatemaid.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
    


</body>

</html>
<?php
include("./footer.php");
?>