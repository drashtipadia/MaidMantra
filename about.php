<?php
include("./connection.php");
include("./header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="icon" href="./images/icon.jpg" />

  <title>About Us</title>
</head>

<body>
  <!-- page header start -->
  <section id="page-name">
    <div class="container h-200">
      <div class="row">
        <div class="col mt-5 text-center">
          <h1>About us</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- page header end -->
  <!-- mission -->
  <section id="mission" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h3>Our Mission</h3>
          <span class="line"></span>
          <p class="lead"> <i class="fa-solid fa-quote-left fa-2xl" style="color: #ffd43b;"></i> Established in 2020,
            Maid Mantra is revolutionizing the way helpers are hired in India. Our mission and resolve is to bring to
            our customers Experienced, experienced, and pandemic ready conquerors.<i
              class="fa-solid fa-quote-right fa-2xl" style="color: #ffd43b;"></i></p>
          </i>
        </div>
      </div>
    </div>
  </section>
  <!-- mission -->
  <!-- page 2 part start -->
  <section class="aboutus">
    <div class="container">
      <div class="about py-5">
        <div class="row">
          <div class=" text-center py-1">
            <h1> Welcome to Maid Mantra</h1>
            <span class="line"></span>
            <div class="row">
              <div class="col-md-6">
                <h1 class="py-5">
                  Best Maid Agency in Ahemdabad
                </h1>
                <P class="lead">
                  Maid Mantra is a Ahemdabad-based firm, established in 2020, and the best home help agency in
                  Ahemdabad,
                  offering part-time and full-time maids, cooks, babysitters, home nurses (male and female), home
                  attendants, senior citizen care, new-born baby care, Etc. in all over Ahemdabad, Narol, Isaon,
                  Maninagar,Naravrangura and Neharunagr locations.
                  We presently have more than 35,000 male and female staff and caretakers with us, and we have offered
                  exemplary services for the last 14 years. We are currently serving 18,000+ homes in Mumbai.
                </P>
              </div>
              <div class="col-md-6 text-center">
                <img src="./images/4in1.jpg" class="img-fluid w-100 h-100  py-5" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- page 2 part end -->
  <!-- Maid staff start-->
  <section id="maids"> <!--class="py-4"-->
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h1> Our Maids</h1>
          <span class="line"></span>
        </div>
      </div>
      <div class="row g-3 text-center  maids-gallery">
        <?php
        $query = "SELECT maid_picture FROM maids LIMIT 8";
        $res = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($res)) {
          ?>
          <div class="col-md-6 col-lg-3 ">
            <img src="./images/<?php echo $row[0] ?>" class="img-fluid" />
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- Maid  staff end-->
</body>
</html>
<?php include("./footer.php") ?>