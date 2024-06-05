<?php
include("./connection.php");
include("./header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.jpg" />

  <title>Contact</title>
</head>

<body>

  <!-- page header start -->
  <section id="page-name">

    <div class="container h-200">
      <div class="row">
        <div class="col mt-5 text-center">
          <h1>Contact-us</h1>
        </div>

      </div>
    </div>
  </section>
  <!-- page header end -->

  <!-- contact start -->
  <section class="contact-section" class="py-5">
    <div class="container">
      <div class="row g-3 justify-content-around py-5">
        <div class="col col-lg-6 col-md-12 col-sm-12 py-5 contact-form ">
          <div class="text-center p-1">
            <h1 class="display-6">
              REQUEST A CALL BACK
            </h1>
          </div>

          <form id="cform" class="row g-3 w-100 m-auto bg-light" name="cform" method="POST" action="./contactuser.php">
            <div class="col-12 ">
              <input type="text" name="cname" id="cname" placeholder="Enter Your Name..."
                class="form-control-lg w-100 border-1" />
              <label for="cnamemsg" id="cnamemsg" class=" d-none errmsg form-label">Name is Required</label>
            </div>

            <div class="col-12 ">
              <input type="text" id="cnumber" name="cnumber" placeholder="Enter Your Phone Number..."
                class="form-control-lg w-100 border-1" />
              <label for="cnumbermsg" id="cnumbermsg" class="d-none errmsg form-label">Number is Required</label>
            </div>
            <div class="col-12">
              <select name="locationid" id="locationid" class="form-control-lg w-100 border-1">
                <option value="" class="option1">locality of Services</option>
                <option value="Paldi">Paldi</option>
                <option value="Neharunagar">Neharunagar</option>
                <option value="Maninagar">Maninagar</option>
                <option value="Narol">Narol</option>
                <option value="Navrangpura">Navrangpura</option>
                <option value="Isanpur">Isanpur</option>
              </select>
              <label for="clocationmsg" id="clocationmsg" class="d-none errmsg form-label">please select
                location...</label>
            </div>
            <div class="col-12">

              <select name="cservices" id="cservices" class="form-control-lg w-100 border-1">
                <option value="" class="option1">What type of Services do you need?</option>
                <?php
                $serQuery = "SELECT * from service";
                $serResult = mysqli_query($con, $serQuery);
                while ($serRow = mysqli_fetch_row($serResult)) { ?>
                  <option value="<?php echo ($serRow[0]); ?>"><?php echo ($serRow[1]) ?></option>
                <?php }
                ?>

              </select>
              <label for="cservicemsg" id="cservicemsg" class="d-none errmsg form-label">select service...</label>
            </div>
            <div class="col-12">
              <select name="ctime" id="ctime" class="form-control-lg w-100 border-1">
                <option value="" class="option1">Services looking for</option>
                <?php
                $hourQuery = "SELECT * from salary";
                $hourResult = mysqli_query($con, $hourQuery);
                while ($Row = mysqli_fetch_row($hourResult)) { ?>
                  <option value="<?php echo ($Row[1]); ?>"><?php echo ($Row[1]) ?></option>
                <?php }
                ?>
              </select>
              <label for="ctimemsg" id="ctimemsg" class="d-none errmsg form-label">please select time......</label>
            </div>
            <div class="col-12 pb-4">
              <button type="submit" class="btn allbtn w-100">Sumbit</button>
            </div>
          </form>

        </div>
        <div class="col col-lg-6 col-md-12 col-sm-12 py-5 contact-form">
          <h1 class="display-6">Contact Info</h1>
          <h3 class="mt-5"><i class="fa-solid fa-location-dot"></i> Office Address</h3>
          <p class="lead mt-3">Shop No B-1B, Bhagat Singh Nagar No 1, Link Road, Iscon, Ahemdabad-300 009 </p>
          <h3 class="mt-3"><i class="fa-solid fa-phone"></i> Phone Number</h3>
          9123542434
          <h3 class="mt-3"><i class="fa-solid fa-envelope"></i> Email</h3>
          maidmantra@gmail.com
        </div>
      </div>
    </div>
    </div>

  </section>
  <!-- contact end -->
  <div class="container">

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d235013.74842583184!2d72.4149266142662!3d23.02047410336025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1689909116569!5m2!1sen!2sin"
      width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>



  <script src="./javascript/validation.js"></script>
</body>

</html>


<?php include("./footer.php") ?>