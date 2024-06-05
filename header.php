<?php
include("./connection.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.png" />



</head>

<body>
  <!-- NAVBAR START -->
  <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <h1 class="navbar-brand fs-2"> Maid Mantra</h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " href="./index.php"> <i class="fa-solid fa-house"></i> Home</a>
          </li>
          <?php
          $query = "SELECT * FROM service";
          $result = mysqli_query($con, $query);
          ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown" href="#" id="navbarDropdown">Service</a>
            <div class="dropdown-menu p-0" aria-labelledby="navbarDropdown">
              <?php while ($row = mysqli_fetch_row($result)) { ?>
                <a class="dropdown-item" href="./information.php?serviceid=<?php echo ($row[0]); ?> "><?php echo ($row[1]); ?></a>
              <?php } ?>
          </li>



          <li class="nav-item">
            <a class="nav-link " href="./package.php">Package</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./about.php">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./contact.php">Contact</a>
          </li>
          <?php
          if (isset($_SESSION['u_id'])) { ?>
            <li class="nav-item dropdown fluid">
              <a class="nav-link btn dropdown allbtn" type="button"
                id="navbarDropdown"><?php echo $_SESSION['u_name'] ?></a>

              <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./userprofile.php">View Profile</a>
                <a class="dropdown-item" href="./userBookingProfile.php">View Booking</a>
                <a class="dropdown-item" href="./userlogout.php">Logout</a>
              </div>

            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="btn allbtn" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Log
                in</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- NAVBAR END -->















  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->





  <!-- login Modal start  -->

  <div class="modal fade" id="loginModal" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="log_form" method="POST" action="./userlogin.php">

        <div class="modal-header ">
          <h5 class="modal-title text-center">LOGIN
          </h5>
        </div>
        <div class="modal-body">

          <div class="alert alert-warning alert-dimissable fade show d-none" id="loginError" role="alert">
            Inavalid username and password
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>

          <div>
            <label class="form-label" for="typeEmail">Email</label>
            <input type="text" id="lemail" name="lemail" class="form-control" />
            <label for="lemailmsg" id="lemailmsg" class=" d-none errmsg form-label">Email is Required</label>
          </div>
          <div>
            <label class="form-label" for="typePassword">Password</label>
            <input type="password" id="lpassword" name="lpassword" class="form-control " />
            <label for="lpasswordmsg" id="lpasswordmsg" class="d-none errmsg form-label">Password is Required</label>
          </div>

          <div>
            <p>Don't have an account? <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                data-bs-target="#register">Sign Up</a>
            </p>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn allbtn">login</button>

        </div>
      </form>
    </div>
  </div>

  <!-- login modal end-->

  <!-- registration modal start -->
  <div class="modal fade" id="register" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="regform" method="POST" action="./registration.php">

        <div class="modal-header ">
          <h5 class="modal-title text-center">Registration
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>
        <div class="modal-body">

          <div class="alert alert-warning alert-dimissable fade show d-none" id="RegisterError" role="alert">
            <p class="m-0"> Already register....
              <button type="button" class="btn-close pl-25" data-bs-dismiss="alert"></button>
            </p>
          </div>

          <div>
            <label class="form-label" for="name">Name</label>
            <input type="text" id="rname" name="rname" class="form-control" />
            <label for="rnamemsg" id="rnamemsg" class=" d-none errmsg form-label">First Name is Required</label>
          </div>
          <div>
            <label class="form-label" for="number">Phone number</label>
            <input type="text" id="rnumber" name="rnumber" class="form-control" />
            <label for="rnumbermsg" id="rnumbermsg" class="d-none errmsg form-label">Phone number is Required</label>
          </div>
          <div>
            <label class="form-label" for="typeEmail">Email</label>
            <input type="text" id="remail" name="remail" class="form-control" />
            <label for="remailmsg" id="remailmsg" class="d-none errmsg form-label">Email is Required</label>
          </div>

          <div class="mt-3">
            <label class="form-label" for="gender">Gender: </label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="male">
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">
              <label class="form-check-label" for="inlineRadio2">Female</label>
            </div>


          </div>




          <div>
            <label class="form-label" for="typePassword">Password</label>
            <input type="password" id="rpassword" name="rpassword" class="form-control " />
            <label for="rpasswordmsg" id="rpasswordmsg" class="d-none errmsg form-label">Password is Required</label>
          </div>
          <div>
            <label class="form-label" for="typePassword">Confirm Password</label>
            <input type="password" id="rcpassword" name="rcpassword" class="form-control " />
            <label for="rcpmsg" id="rcpmsg" class="d-none errmsg form-label">Confirm password is Required</label>
          </div>
        </div>

        <div class="modal-footer">
          <input type="reset" class="btn btn-secondary" value="Reset"></input>
          <!-- class="btn btn-secondary" -->
          <input type="submit" class="btn allbtn" value="Submit"></input>
          <!-- class="btn btn-primary" -->

        </div>
      </form>
    </div>
  </div>



  <!-- registration modal end -->

  <script src="./javascript/bootstrap.js"></script>
  <script src="./javascript/all.min.js"></script>
  <script src="./javascript/script.js"></script>

  <?php
  if (isset($_GET['registererror'])) {
    echo ("<script> registerError();</script>");
  }
  ?>
  <?php
  if (isset($_GET['loginerr'])) {
    echo ("<script> loginError();</script>");
  }
  ?>
</body>

</html>