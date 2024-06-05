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

    <title>User Feedback</title>
</head>

<body>
<section id="FeedbacklistSection" class="mt-5">
    <div class="container d-flex justify-content-center">
      <h1 class="m-auto">User Feedback</h1>
    </div>
  </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <h5> ID</h5>
                </div>
                <div class="col-1">
                    <h5>NAME</h5>
                </div>

                <div class="col-3">
                    <h5>EMAIL</h5>
                </div>
                <div class="col-5">
                    <h5>FEEDBACK</h5>
                </div>
                <div class="col-1">
                    <h5>STATUS</h5>
                </div>

                <div class="col-1">
                    <h5>DELETE</h5>
                </div>
                <hr />
            </div>
        </div>
    </section>
    <?php
    $qur = "SELECT * FROM feedback";
    $Res = mysqli_query($con, $qur);

    while ($row = mysqli_fetch_row($Res)) {
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-1">
                        <h5> <?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-1">
                        <h5> <?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-3">
                        <h5> <?php echo ($row[2]) ?></h5>
                    </div>
                    <div class="col-5">
                        <h5> <?php echo ($row[3]) ?></h5>
                    </div>
                    <div class="col-1">
                           <?php if($row[4] == ''){ ?>
                            <input type="checkbox" name="status" value="True" onclick="feedbackcheckredirect(<?php echo ($row[0]) ?>)">
                            <?php }else {?>
                            <input type="checkbox" name="status" checked onclick="feedbackuncheckredirect(<?php echo ($row[0]) ?>)">
                             <?php } ?>
                        <!-- </form> -->
                    </div>
                    <div class="col-1">
                    <a href="./deleteAdminFeedback.php?feedbackuser_id=<?php echo ($row[0]); ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>

                    <hr />
                </div>
            </div>
        </section>
    <?php } ?>
    <script src="./javascript/feedbackcheck.js"></script>
    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>

</html>
<?php include("./footer.php") ?>