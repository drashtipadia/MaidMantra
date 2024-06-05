<?php
include("./header.php");
if (!isset($_SESSION['admin'])) {
  header("Location:./adminlogin.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/all.min.css" />

  <title>Home</title>
</head>

<body>
   <div class="">
      <img src="../images/bgadmin.jpg"  class="img-fluid h-100 w-100"/>
    </div>

  <script src="./javascript/bootstrap.js"></script>
  <script src="./javascript/all.min.js"></script>
</body>

</html>

<?php include("./footer.php") ?>