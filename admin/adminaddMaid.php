<?php
include("./header.php");
include("../connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css" />

    <title>Maids</title>
</head>

<body>
   
<section class="py-5">
        <div class="container bg-light py-5">

            <div class="row py-3">
                <div class="col text-center">
                    <h3>Add New Maid </h3>
                    <span class="line"></span>
                </div>
            </div>

            <div class="row m-5 ">
                <div class="col justify-content-around">
                    <div class="card ms-auto ">
                        <form id="adminaddmaidform"  method="POST" action="./insertAdminMaid.php" enctype="multipart/form-data" >
                            <!--  -->
                            <div class=" m-3 border-3 ">
                             <input type="text" id="maid_name" name="maid_name" class="form-control"
                                    placeholder="Name">
                              
                               <label for="mnamemsg" id="mnamemsg" class=" d-none errmsg form-label">Name is Required</label>
                            </div>
                            <div class=" m-3  border-3 ">
                             <input type="text" id="maid_age" name="maid_age" class="form-control"
                                    placeholder="Age">
                             <label for="magemsg" id="magemsg" class=" d-none errmsg form-label">Age is Required</label>
                            </div>
                            <div class=" m-3  border-3 ">
                                <label for="user_gender">Gender : </label>
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="male">
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <label for="mgendermsg" id="mgendermsg" class=" d-none errmsg form-label">Age is Required</label>
                            </div>
                            <div class="m-3  border-3 ">
                             <input type="text" id="maid_number" name="maid_number" class="form-control"
                                    placeholder="Number">
                            <label for="mnumbermsg" id="mnumbermsg" class=" d-none errmsg form-label">Number is Required</label>
                            </div>
                            <div class=" m-3  border-3 ">
                                <input type="file" name="image1" id="image1" class="form-control-lg" placeholder="First Image">
                                <label for="mimagemsg" id="mimagemsg" class=" d-none errmsg form-label">Please select the image</label>
                            </div>
                            <div class="m-3  border-3">
                                <select class="form-select form-control-lg mb-3" name="Service" id="Service" aria-label="Default select example">
                                <option value="blank">Select service</option>
                                    <?php
                                        $serQuery = "SELECT * from service";
                                        $serResult = mysqli_query($con,$serQuery);
                                        while($serRow = mysqli_fetch_row($serResult)){?>
                                            <option value="<?php echo($serRow[0]); ?>"><?php echo($serRow[1]) ?></option>
                                        <?php }
                                    ?>
                                </select>
                                <label for="mservicemsg" id="mservicemsg" class=" d-none errmsg form-label">Please select the service</label>
                            </div>
                            
                            
                           <div class="m-3  border-3">
                            <button type="submit" class="btn btn-primary btn-block mb-4 w-25">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

        </div>
    </section>




    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
    <script src="./javascript/addmaidscript.js"></script>
                                            
</body>

</html>
<?php include("./footer.php") ?>