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

    <title>Maids</title>
</head>

<body>
    <section id="FeedbacklistSection" class="mt-5">
        <div class="container d-flex justify-content-center">
            <h1 class="m-auto">Maids</h1>
        </div>
    </section>
    <!-- pagination initialization start -->
    <?php if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }
    $limit = 8;
    $initial_page = ($page_number - 1) * $limit;
    //echo $initial_page;
    //pagination initialization end 
    ?>

    <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
        <a class="btn btn-dark w-25" href="./adminaddMaid.php">Add Maid</a>
    </div>
    <div class="d-flex justify-content-center align-items-center m-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-1">
                    <h5>ID</h5>
                </div>
                <div class="col-2">
                    <h5>Name</h5>
                </div>
                <div class="col-1">
                    <h5>Age</h5>
                </div>

                <div class="col-1">
                    <h5>Gender</h5>
                </div>
                <div class="col-2">
                    <h5>Number</h5>
                </div>
                <div class="col-1">
                    <h5>Picture</h5>
                </div>
                <div class="col-1">
                    <h5>Status</h5>
                </div>
                <div class="col-1">
                    <h5>Service</h5>
                </div>
                <div class="col-1">
                    <h5>Edit</h5>
                </div>

                <div class="col-1">
                    <h5>Delete</h5>
                </div>
                <hr />
            </div>
            <?php
            $qur = "SELECT * FROM maids";
            $Res = mysqli_query($con, $qur);

            // total number of pagination
            $totalrow = mysqli_num_rows($Res);
            //echo $totalrow;
            $totalpage = ceil($totalrow / $limit);
            //echo $totalpage;
            $qur = $qur . " LIMIT " . $initial_page . "," . $limit;
            //echo $qur;
            $Res = mysqli_query($con, $qur);
            while ($row = mysqli_fetch_row($Res)) {

                ?>
                <div class="row">
                    <div class="col-1">
                        <h5><?php echo ($row[0]) ?></h5>
                    </div>
                    <div class="col-2">
                        <h5><?php echo ($row[1]) ?></h5>
                    </div>
                    <div class="col-1">
                        <h5><?php echo ($row[2]) ?></h5>
                    </div>
                    <div class="col-1">
                        <h5><?php echo ($row[3]) ?></h5>
                    </div>

                    <div class="col-2">
                        <h5><?php echo ($row[4]) ?></h5>
                    </div>
                    <div class="col-1">
                        <?php
                        $file = ($row[5]);
                        ?>
                        <img class="mx-2" src="../images/<?php echo ($file); ?>" width="80px" height="60px">

                    </div>
                    <div class="col-1">
                        <h5><?php echo ($row[6]) ?></h5>
                    </div>
                    <div class="col-1">
                        <h5><?php
                        $ser_query = "SELECT * FROM service Where service_Id=" . $row[7];
                        //echo $q;
                        $ser_res = mysqli_query($con, $ser_query);
                        $ser_row = mysqli_fetch_row($ser_res);
                        echo ($ser_row[1]); ?></h5>
                    </div>
                    <div class="col-1">
                        <h5><a href="./updateAdminmaid.php?m_id=<?php echo ($row[0]); ?>">Update</a></h5>

                    </div>
                    <div class="col-1">
                        <a href="./deleteAdminmaid.php?m_id=<?php echo ($row[0]); ?>"><i class="fa-solid fa-trash"></i></a>
                    </div>
                    <hr />
                </div>
            <?php } ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <!-- previouse portion start -->
                    <?php
                    if ($page_number == 1) {
                        echo ("<li class='page-item disabled'><a class='page-link' href=#'>Previous</a></li>");
                    } else {
                        if (!isset($_GET['page'])) {
                            echo ("<li class='page-item'><a class='page-link' href='" . $_SERVER['REQUEST_URI'] . "?page=" . ($page_number + 1) . "'>Previous</a></li>");
                        } else {
                            $filterurl = preg_replace('~(\?|&)page=[^&]*~', "?page=" . ($page_number - 1), $_SERVER["REQUEST_URI"]);

                            echo ("<li class='page-item'><a class='page-link' href='" . $filterurl . "'>Previous</a></li>");
                        }
                    }
                    ?>
                    <!-- previous portion end -->
                    <?php
                    for($p_number = 1; $p_number<= $totalpage; $p_number++) {
                            echo("<li class='page-item'>");
                            if(!isset($_GET['page'])){
                                echo ("<a class='page-link' href=".$_SERVER['REQUEST_URI']."?page=".$p_number.">".$p_number."</a>");
                            }  
                            else
                            {
                                $filterurl = preg_replace('~(\?|&)page=[^&]*~',"?page=".$p_number, $_SERVER["REQUEST_URI"]);
                                echo('<a class="page-link" href = "'.$filterurl.'">' . $p_number . ' </a>');  
                            }
                            echo("</li>");

                        }
                    ?>
                    <!-- next portion start -->
                    <?php
                    if ($page_number == $totalpage) {
                        echo ("<li class='page-item disabled'><a class='page-link'>Next</a></li>");
                    } else {
                        if (!isset($_GET['page'])) {
                            echo ("<li class='page-item'><a class='page-link' href='" . $_SERVER['REQUEST_URI'] . "?page=" . ($page_number + 1) . "'>Next</a></li>");
                        } else {
                            $filterurl = preg_replace('~(\?|&)page=[^&]*~',"?page=".($page_number+1), $_SERVER["REQUEST_URI"]);
                    
                            echo ("<li class='page-item'><a class='page-link' href='" . $filterurl . "'>Next</a></li>");
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    <script src="./javascript/bootstrap.js"></script>
    <script src="./javascript/all.min.js"></script>
</body>

</html>
<?php include("./footer.php") ?>