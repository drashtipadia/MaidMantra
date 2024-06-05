<?php 
include("./connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/bootstrap.min.css" />
  <link rel="stylesheet" href="./css/all.min.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.jpg" />

  <title></title>
</head>

<body>
  <!-- Footer Start -->
  <footer id="main-footer" class="text-light py-5 footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 px-5" id="foot">
          <h4>Maid Mantra</h4>
          <p class="lead">We are India's largest online aggregator of maid bureaus. Whether you are looking for a maid
            or a nanny or a patient caretaker in Gujarat you will find the best quality and experienced staff here.
          </p>

        </div>
        <div class="col-md-6 px-5">
          <h4> About Maid Mantra.com</h4>
          <ul class="footer-link">
            <li><a href="./index.php">Home</a></li>
            <li><a href="./about.php">About us</a></li>
            <li><a href="./privacypolicy.php">Privacy Policy</a></li>
            <li><a href="./contact.php">Contact</a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>


  <!-- Footer End -->
  <footer id="footer" class="bg-dark text-light py-3 footer">
    <div class="container text-center">
      <h4>Developed by: Drashti Padia</h4>
      <?php if (isset($_SESSION['u_id'])) { ?>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal">
        feedback
      </button>
      <?php }else{}?>
    </div>
  </footer>
  <!-- Modal Feedback start -->
  <div class="modal fade text-dark" id="feedbackModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="fform" method="POST" action="feedback.php">
          <div class="model-header">
            <h5 class="modal-title m-1 text-center">Feedback</h5> 
          </div>

          <div class="modal-body">

            <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" id="feedname" name="feedname" class="form-control">
              <label for="fnamemsg" id="fnamemsg" class=" d-none errmsg form-label">Name is Required</label>
            </div>
            <div class="form-group">
              <label for="Email">Email</label>
              <input type="email" id="femail" name="femail" class="form-control" placeholder="abc@gmail.com">
              <label for="femailmsg" id="femailmsg" class=" d-none errmsg form-label">Email is Required</label>
            </div>
            <div class="form-group">
              <label for="Feedback">Feedback</label>
              <textarea class="form-control" id="feedback" name="feedback" placeholder="write here...."></textarea>
              <label for="feedbackmsg" id="feedbackmsg" class=" d-none errmsg form-label">Some thing write in
                feedback</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn allbtn" value="Submit"></input>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Model feedback end -->

  <script src="./javascript/bootstrap.js"></script>
  <script src="./javascript/all.min.js"></script>
  <script src="./javascript/feedbackvalidation.js"></script>

</body>

</html>