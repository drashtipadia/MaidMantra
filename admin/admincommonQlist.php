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

    <title>Common Question</title>
</head>

<body>




    <section id="FeedbacklistSection" class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Common Question</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container bg-light py-5">
            <div class="row  ">
                <div class="col justify-content-center">
                    <h3 class="mb-3 text-center">Add Common Question</h3>
                </div>
            </div>
            <div class="card ms-auto">
                <form id="addcommonquestion" method="POST" action="./insertAdmincomQ.php">
                    <div class="row py-5 px-3 justify-content-around align-item-center">

                        <div class="col-3 ">
                            <h5><input type="text" id="commonquestion" name="commonquestion" class="form-control" placeholder="Question.." /></h5>
                            <label for="valuemsg" id="addQuemsg" class=" d-none errmsg form-label">Enter Question</label>
                           
                        </div>
                        <div class="col-3">
                            
                            <h5><input type="text" class="form-control"  id="questionvalue" name="questionvalue" placeholder="question Value" /></h5>
                            
                        </div>
                        <div class="col-3 ">
                        <select class="form-select" name="valuetype" id="valuetype" aria-label="Default select example">
                                <option value="blank" selected >Select Value Type</option>
                                <option value="text">text</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">checkbox</option>
                                <option value="date">Date</option>
                                <option value="time">Time</option>
                                <option value="number">Number</option>
                        </select>
                        <label for="valtypemsg" id="valtypemsg" class=" d-none errmsg form-label">Choose value</label> 
                        </div>
                        <div class="col-3 ">
                            <h5><input type="submit" value="ADD" class="btn btn-primary w-100 form-control"></h5>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- <div class="d-flex justify-content-center align-item-center m-5">

    <form method="POST" id="addcommonquestion" action="./insertAdmincomQ.php" >
    <h3 class="mb-3">Add New Common Question</h3>

        
    
        <input type="text" name="commonquestion"  id="commonquestion" class="form-control-lg w-75 mb-3" placeholder="Question......"><br>
        <input type="text" name="questionvalue"  id="questionvalue" class="form-control-lg w-75 mb-3" placeholder="value......"><br>
        <label for="addcqmsg" id="addcqmsg" class=" d-none errmsg form-label mb-3">Add Qusetion</label>
        <input type="submit" class="btn btn-primary w-75" value="ADD">
      
    </form>
  </div>-->

    <section class="py-3">
        <div class="container">
            <div class="row ">
                <div class="col-1">
                    <h5> ID</h5>
                </div>
                <div class="col-3">
                    <h5>NAME</h5>
                </div>
                <div class="col-3">
                    <h5>Value</h5>
                </div>
                <div class="col-2">
                    <h5>Value Type</h5>
                </div>

                <div class="col-2">
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
    $qur = "SELECT * FROM commonquestion";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container">
                <div class="row justify-content-center" id="editRowCommonQuestion<?php echo ($row[0]); ?>">
                    <div class="col-1">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[2]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[3]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5><a href="#" onClick="showUpdate(<?php echo ($row[0]); ?>);">Update</a></h5>
                    </div>
                    <div class="col-1">
                        <a href="./deleteAdmincomQ.php?Cque_id=<?php echo ($row[0]); ?>"><i
                                class="fa-solid fa-trash"></i></a>
                    </div>

                    <hr />
                </div>


                <form id="editFormCommonQuestion<?php echo ($row[0]);?>" class="row d-none" action="./updateAdmincomQ.php"
                    method="POST" onsubmit="return blankvalid(<?php echo ($row[0]);?>);">

                    <div class="col-1">
                        <input type="text" disabled value="<?php echo ($row[0]); ?>">
                        <input type="hidden" name="cq_id" value="<?php echo ($row[0]); ?>">
                    </div>
                    <div class="col-3">
                        <input type="text" name="cq_name" id="cq_name<?php echo ($row[0]);?>"  class="" value="<?php echo ($row[1]); ?>">
                    </div>
                    <div class="col-3">
                        <input type="text" name="cq_value" class="" value="<?php echo ($row[2]); ?>">
                    </div>
                    <div class="col-2">
                       <select class="form-select" name="cq_type" id="cq_type" aria-label="Default select example">
                                <option value="no">Select Value Type</option>
                                <option value="text">text</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">checkbox</option>
                                <option value="date">Date</option>
                                <option value="time">Time</option>
                                <option value="number">Number</option>
                        </select>
                    </div>

                    <div class="col-2">
                        <input type="submit" value="Save" class="btn btn-primary">

                    </div>
                    <div class="col-1">
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
    <script src="./javascript/ComQuescript.js"></script>
</body>

</html>
<?php include("./footer.php") ?>