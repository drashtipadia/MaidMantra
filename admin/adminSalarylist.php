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

    <title>Hours/Salary</title>
</head>

<body>
    <section  class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">  Hours Salary List</h1>
        </div>
    </section>

    <section class="py-5">
        <div class="container bg-light py-5">
            <div class="row  ">
                <div class="col justify-content-center">
                    <h3 class="mb-3 text-center">Add Hours/Salary</h3>
                </div>
            </div>
            <div class="card ms-auto">
                <form id="addsalaryform" method="POST" action="./insertAdminSalary.php">
                    <!--  -->
                    <div class="row py-5 px-3 justify-content-around align-item-center">

                        <div class="col-3 ">
                            <h5><input type="text" class="form-control" name="hour" id="hour" placeholder="Hours.." /></h5>
                            <label for="addhourmsg" id="addhourmsg" class=" d-none errmsg form-label mb-3">Add Hours</label>
                        </div>
                        <div class="col-3">
                            <h5><input type="text" class="form-control" name="newsalary" id="newsalary" placeholder="Salary" /></h5>
                            <label for="addsalarymsg" id="addsalarymsg" class=" d-none errmsg form-label mb-3">Add Salary</label>
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
                <div class="col-1">
                    <h5> ID</h5>
                </div>
                <div class="col-3">
                    <h5>Hours</h5>
                </div>
                <div class="col-3">
                    <h5>Salary</h5>
                </div>
                

                <div class="col-3">
                    <h5>UPDATE</h5>
                </div>

                <div class="col-2">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>
    <?php
    $qur = "SELECT * FROM salary";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container">
                <div class="row justify-content-center" id="editRow<?php echo($row[0]); ?>">
                    <div class="col-1">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[2]) ?></h5>
                    </div>
                   
                    <div class="col-3">
                    <h5><a href="#" onClick="showUpdate(<?php echo($row[0]); ?>);">Update</a></h5>
                    </div>
                    <div class="col-2">
                        <a href="./deleteAdminsalarylist.php?salary_id=<?php echo($row[0]); ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>

                    <hr />
                </div>


                <form id="editForm<?php echo($row[0]);?>" class="row d-none" action="./updateAdminsalarylist.php" method="POST"
                      onsubmit="return blankvalid(<?php echo ($row[0]);?>);"> 
               
               <div class="col-1">
                   <input type="text" disabled value="<?php echo($row[0]); ?>">
                   <input type="hidden" name="salaryid" value="<?php echo($row[0]); ?>">
               </div>
               <div class="col-3">
                   <input type="text" name="edithours" id="edithours<?php echo ($row[0]);?>" value="<?php echo($row[1]); ?>">
               </div>
               <div class="col-3">
                   <input type="text" name="editsalary" id="editsalary<?php echo ($row[0]);?>" value="<?php echo($row[2]); ?>">
               </div>
              
             
               <div class="col-3">
                   <input type="submit" value="Save" class="btn btn-primary">

               </div>
               <div class="col-2">
                   <input type="button" value="Cancel" class="btn btn-dark" onClick="cancelEdit(<?php echo($row[0]); ?>);">
               </div>
               <hr />
           
           </form>






            </div>
        </section>
    <?php } ?>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
    <script src="./javascript/salary.js"></script>
</body>

</html>
<?php include("./footer.php") ?>