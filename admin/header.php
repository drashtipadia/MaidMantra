<?php 
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location:./adminlogin.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />


</head>

<body>

  <nav class="navbar navbar-dark bg-dark py-4">
    <div class="container-fluid">
      <h1 class="navbar-brand mb-0 h1 ">Welcome <?php echo $_SESSION['admin']; ?></h1>
      <a class="btn btn-light" href="./adminlogout.php" type="button">Logout</a>
    </div>
  </nav>

  <nav class="navbar navbar-expand-lg secondnavbar">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            Services
          </a>
          <div class="dropdowncolor">
            <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="./adminservice.php">Service</a></li>
              <li><a class="dropdown-item" href="./adminServicesinfo.php">Service Information</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminMaidlist.php">Maid</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminregsiteruser.php">User</a>
        </li>
        <li class="nav-item">
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            Booking Details
          </a>
          <div class="dropdowncolor">
            <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="./adminBookingdetail.php">Booking</a></li>
              <li><a class="dropdown-item" href="./adminPackagebookingdetail.php">Pacakge Booking</a></li>
              
              
            </ul>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link  dropdown" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
            Question
          </a>
          <div class="dropdowncolor">
            <ul class="dropdown-menu p-0" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="./adminSalarylist.php">Salary/Hours</a></li>
              <li><a class="dropdown-item" href="./admincommonQlist.php">Common Question</a></li>
              <li><a class="dropdown-item" href="./adminspecificQlist.php">Specific Question</a></li>
              
            </ul>
          </div>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="./adminpackage.php">Package</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminuserfeedback.php">FeedBack</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./adminusercontactus.php">Conatct user</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="./adminprofile.php">Profile</a>
        </li>

      </ul>
    </div>
    </div>
  </nav>



  <script src="./javascript/bootstrap.js"></script>
  <script src="./javascript/all.min.js"></script>
</body>

</html>