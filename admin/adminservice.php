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

    <title>Service</title>
</head>

<body>

    <section class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Services</h1>
        </div>
    </section>

    <section class="py-4">
        <div class="container bg-light py-5">
           
            <div class="d-flex justify-content-center align-item-center m-2">

                <form method="POST" id="addservice" action="./insertAdminservice.php">
                    <h3 class="mb-2">Add New Service</h3>

                    <input type="text" name="newservice" id="newservice" class="form-control-lg w-75 mb-3"
                        placeholder="Service......">
                        <br>
                    <label for="addservicemsg" id="addservicemsg" class=" d-none errmsg form-label mb-3">Add Service</label>
                    <input type="submit" class="btn btn-primary w-75" value="ADD">

                </form>
            </div>

        </div>
    </section>



    <section class="py-3">
        <div class="container text-center">
            <div class="row ">
                <div class="col-3">
                    <h5> ID</h5>
                </div>
                <div class="col-3">
                    <h5>NAME</h5>
                </div>


                <div class="col-3">
                    <h5>UPDATE</h5>
                </div>

                <div class="col-3">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>
    <?php
    $qur = "SELECT * FROM service";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container text-center">
                <div class="row justify-content-center" id="editRowservice<?php echo ($row[0]); ?>">
                    <div class="col-3">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>

                    <div class="col-3">
                        <h5><a href="#" onClick="showUpdate(<?php echo ($row[0]); ?>);">Update</a></h5>
                    </div>
                    <div class="col-3">
                        <a href="./deleteAdminservice.php?ser_id=<?php echo ($row[0]); ?>"><i
                                class="fa-solid fa-trash"></i></a>
                    </div>

                    <hr />
                </div>


                <form id="editserviceForm<?php echo ($row[0]); ?>" class="row d-none" action="./updateAdminService.php"
                    method="POST" onsubmit="return blankvalid(<?php echo ($row[0]);?>);">

                    <div class="col-3">
                        <input type="text" disabled value="<?php echo ($row[0]); ?>">
                        <input type="hidden" name="ser_id" id="ser_id" value="<?php echo ($row[0]); ?>">
                    </div>
                    <div class="col-3">
                        <input type="text" name="ser_name" id="ser_name<?php echo ($row[0]);?>"  value="<?php echo ($row[1]); ?>"><br>
                        <label for="editsermsg" id="editsermsg" class=" d-none errmsg form-label mb-3">Enter value</label>
                    </div>

                    <div class="col-3">
                        <input type="submit" value="Save" class="btn btn-primary">

                    </div>
                    <div class="col-3">
                        <input type="button" value="Cancel" class="btn btn-dark"
                            onClick="cancelEdit(<?php echo ($row[0]); ?>);">
                    </div>
                    <hr />

                </form>
            </div>
        </section>
    <?php } ?>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
    <script src="./javascript/service.js"></script>
</body>

</html>
<?php include("./footer.php") ?>