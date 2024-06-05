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

    <title>Specific Question</title>
</head>

<body>
    <section id="FeedbacklistSection" class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Specific Question</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container bg-light py-5">
            <div class="row  ">
                <div class="col justify-content-center">
                    <h3 class="mb-3 text-center">Add Specific Question</h3>
                </div>
            </div>
            <div class="card ms-auto">
                <form id="addSpeQueform" method="POST" action="./insertAdminspeQ.php">
                    <div class="row py-5 px-3 justify-content-around align-item-center">

                        <div class="col-3 ">
                            <h5><input type="text" id="question" name="question" class="form-control" placeholder="Question.." /></h5>
                            <label for="questionmsg" id="questionmsg" class=" d-none errmsg form-label">Enter Question</label>
                        </div>
                        <div class="col-3">
                            
                            <h5><input type="text" class="form-control"  id="questionvalue" name="questionvalue" placeholder="question Value" /></h5>
                            <h6>Enter value with , separtor</h6>
                            <label for="valuemsg" id="valuemsg" class=" d-none errmsg form-label">Enter Value</label>
                        </div>
                        <div class="col-3 ">
                        <select class="form-select form-control-lg mb-3" name="service" id="service" aria-label="Default select example">
                                    <?php
                                        $serQuery = "SELECT * from service";
                                        $serResult = mysqli_query($con,$serQuery);
                                        while($serRow = mysqli_fetch_row($serResult)){?>
                                            <option value="<?php echo($serRow[0]); ?>"><?php echo($serRow[1]) ?></option>
                                        <?php }
                                    ?>
                                </select>
                             <label for="servicemsg" id="servicemsg" class=" d-none errmsg form-label">Please select the service</label> 
                        </div>
                        <div class="col-3 ">
                            <h5><input type="submit" value="ADD" class="btn btn-primary w-100 form-control"></h5>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row ">
                <div class="col-2">
                    <h5> ID</h5>
                </div>
                <div class="col-2">
                    <h5>NAME</h5>
                </div>
                <div class="col-3">
                    <h5>Value</h5>
                </div>
                <div class="col-2">
                    <h5>Service</h5>
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
    $qur = "SELECT * FROM specificquestion,service WHERE specificquestion.service_id=service.service_id";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container">
                <div class="row justify-content-center" id="editRowSpeQue<?php echo($row[0]); ?>">
                    <div class="col-2">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[2]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5> <?php echo ($row[5]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5><a href="#" onClick="showUpdate(<?php echo($row[0]); ?>);">Update</a></h5>
                    </div>
                    <div class="col-1">
                        <a href="./deleteAdminspeQ.php?speQid=<?php echo($row[0]); ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>

                    <hr />
                </div>



                <form id="editFormSpeQue<?php echo($row[0]);  ?>" class="row d-none" action="./updateAdminspeQ.php" method="POST"
                       onsubmit="return blankvalid(<?php echo ($row[0]);?>);"> 
                
                    <div class="col-2">
                        <input type="text" disabled value="<?php echo($row[0]); ?>">
                        <input type="hidden" name="SQ_id" value="<?php echo($row[0]); ?>">
                    </div>
                    <div class="col-2">
                        <input type="text" name="SQ_name" id="SQ_name<?php echo ($row[0]);?>"  value="<?php echo($row[1]); ?>">
                    </div>
                    <div class="col-3">
                        <input type="text" name="SQ_value" id="SQ_value<?php echo ($row[0]);?>" value="<?php echo($row[2]); ?>">
                    </div>
                    <div class="col-2">
                            <select name="SQ_service">
                                <?php 
                                    $serquery="SELECT * FROM service";
                                    $serres = mysqli_query($con,$serquery);
                                    
                                    while($serrow = mysqli_fetch_row($serres)){
                                        if($serrow[0] == $row[2]){
                                ?>
                                            <option value="<?php echo($serrow[0]); ?>" selected><?php echo($serrow[1]) ?></option>
                                <?php
                                        }
                                        else{ ?>
                                            <option value="<?php echo($serrow[0]); ?>"><?php echo($serrow[1]) ?></option>
                                        <?php }
                                    }
                                ?>
                            </select>
                    </div>

                    <div class="col-2">
                        <input type="submit" value="Save" class="btn btn-primary">

                    </div>
                    <div class="col-1">
                        <input type="button" value="Cancel" class="btn btn-dark" onClick="cancelEdit(<?php echo($row[0]); ?>);">
                    </div>
                    <hr />
                
                </form>








            </div>
        </section>
    <?php } ?>
    <script src="./javascript/SpeQuescript.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
    
</body>

</html>
<?php include("./footer.php") ?>