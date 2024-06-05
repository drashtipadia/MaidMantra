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
    <title>Add Infromation</title>

</head>

<body>
    <section class="py-5">
        <div class="container bg-light py-5">
            <div class="row py-3">
                <div class="col text-center">
                    <h3>Add Service Information</h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="row m-5 ">
                <div class="col justify-content-around">
                    <div class="card ms-auto ">
                        <form method="POST" action="./insertAdminServiceinfo.php" enctype="multipart/form-data" id="serviceinfo">
                            <div class="form-floating m-3 border-3 ">
                                <input type="text" id="info_title" name="info_title" class="form-control">
                                <label id="titlemsg">Title</label>
                                
                            </div>
                            
                            <div class="form-floating m-3  border-3 ">
                                <textarea class="form-control" id="info_descripition" name="info_descripition"></textarea>
                                <label id="info_msg">Descritption</label>
                            </div>
                            <div class=" m-3  border-3 ">
                                <input type="file" name="newimage" id="newimage" class="form-control-lg" value="" />
                                <label id="img_msg" class="d-none errmsg">Please Picture Upload</label>
                            </div>
                            <div class="m-3  border-3">
                                <select class="form-select form-control-lg mb-3" name="info_service"
                                    aria-label="Default select example" id="info_service">
                                    <option value="no">Select a service</option>
                                    <?php
                                    $serquery = "SELECT * from service";
                                    $serResult = mysqli_query($con, $serquery);
                                    while ($serRow = mysqli_fetch_row($serResult)) {
                                        ?>
                                            <option  value="<?php echo ($serRow[0]); ?>"><?php echo ($serRow[1]) ?>
                                            </option>
                                           
                                         
                                        
                                        <?php } 
                                    ?>
                                </select>
                                <label id="info_sermsg" class="d-none errmsg">Please Select Service</label>
                            </div>
                            

                            <div class="m-3  border-3">
                            <button type="submit" class="btn btn-primary btn-block mb-4 w-25">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </section>


    <script src="./javascript/serviceinformation.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
   
</body>

</html>
<?php
include("./footer.php");
?>