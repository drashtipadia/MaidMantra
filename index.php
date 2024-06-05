<?php
include("./header.php");
include("./connection.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  </link>
  <link rel="icon" href="./images/icon.png" />

  <title>Home</title>
</head>

<body>

  <!-- Slider start -->
  <div id="mycarousel" class="carousel  slide pt-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#mycarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="slide 1"></button>
      <button type="button" data-bs-target="#mycarousel" data-bs-slide-to="1" aria-label="slide 2"></button>
      <button type="button" data-bs-target="#mycarousel" data-bs-slide-to="2" aria-label="slide 3"></button>
      <button type="button" data-bs-target="#mycarousel" data-bs-slide-to="3" aria-label="slide 4"></button>
    </div>
    <div class="carousel-inner pt-5">
      <div class="carousel-item  active">
        <img src="./images/slider baby.jpg" class="img-carousel w-100" />
        <div class="carousel-caption  d-sm-block caption1 ">
          <h1 class="display-3">Baby-Sitter</h1>
          <p class="lead">
            If you can bib them, I will sit them. Friendly babysitters arrive at your door. I'll treat your
            child like mine. Go have fun; I'll do the rest.
          </p>

        </div>
      </div>
      <div class="carousel-item ">
        <img src="./images/slider clean.jpeg" class="img-carousel w-100" />
        <div class="carousel-caption  d-sm-block caption2">
          <h1 class="display-3">Cleaning</h1>
          <p class="lead">
            Get your life back on track quickly so you can continue concentrating on the important things.
            Hire a full-time maid today.
          </p>

        </div>
      </div>
      <div class="carousel-item ">
        <img src="./images/slider cook.jpeg" class="img-carousel w-100" />
        <div class="carousel-caption  d-sm-block  caption3 ">
          <h1 class="display-3">Cooking</h1>
          <p class="lead">
            Get experienced cooks for all types of cuisine, like Gujrati, Marathi, Punjabi, South Indian,
            and North Indian
          </p>

        </div>
      </div>
      <div class="carousel-item ">
        <img src="./images/slider elder.jpg" class="img-carousel w-100" />
        <div class="carousel-caption d-sm-block caption4">
          <h1 class="display-3">Elder & patient care</h1>
          <p class="lead">
            We will take care of your loved ones in your absence. Leave all your worries to us.
          </p>

        </div>
      </div>
    </div>
  </div>
  <!-- slider end -->



  <!-- Heading start one-->
  <section id="section-one">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h3>We offer Services </h3>
          <span class="line"></span>

        </div>
      </div>
      <div class="row height-20px py-5">
        <div class="col-md-3 text-center">
          <i class="fa-solid fa-baby fa-4x mb-3" style="color: #2D4356;"></i>
          <a href="./information.php?serviceid=1">
            <h1 class="display-6">Baby-sitter</h1>
          </a>
          <div>
            <p class="lead"> Friendly babysitters arrive at your door. Go have fun; I'll do the rest.</p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <i class="fa-solid fa-kitchen-set fa-4x mb-3" style="color: #2D4356;"></i>
          <a href="./information.php?serviceid=2">
            <h1 class="display-6">Cook</h1>
          </a>
          <div>
            <p class="lead"> Get experienced cooks for all types of cuisine.</p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <i class="fa-solid fa-broom fa-4x mb-3" style="color: #2D4356;"></i>
          <a href="./information.php?serviceid=3">
            <h1 class="display-6">Maid</h1>
          </a>
          <div>
            <p class="lead"> Get your life back on track quickly so you can continue concentrating on the
              important things. </p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <i class="fa-solid fa-person-cane fa-4x mb-3" style="color: #2D4356;"></i>
          <a href="./information.php?serviceid=4">
            <h1 class="display-6">Elder Care</h1>
          </a>
          <div>
            <p class="lead"> We will take care of your loved ones in your absence. Leave all your worries to us.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Heading end one-->
  <!-- heading  second start -->
  <section id="section-two" class="py-5">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col mt-5 mb-5 text-center">
            <h3>Online Maid Services</h3>
            <p class="lead">We are well concerned about customer’s safety, security therefore we only
              provide verified and reliable workers.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- heading  second end -->


  <!-- user review start -->
  <section class="mt-5 mb-0">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h3>What Our Clients Say </h3>
          <span class="line"></span>
        </div>
      </div>
    </div>
  </section>
  <section class="mb-5">

    <div class="container booking  py-3">

      <div class="row justify-content-around">
        <?php $fbQuery = "SELECT * FROM feedback WHERE feed_status='True'";
        $fbresult = mysqli_query($con, $fbQuery);
        while ($fbrow = mysqli_fetch_array($fbresult)) {
          ?>
          <div class="col-lg-4 col-md-6">
            <div class="card w-100 h-100">
              <div class="card-body">
                <h5 class="card-title"><?php echo $fbrow[1]; ?></h5>

                <p class="card-text"><?php echo $fbrow[3]; ?></p>

              </div>
            </div>
          </div>
        <?php } ?>


      </div>
    </div>

  </section>

  <!-- user review end -->
  <!-- heading  second start -->

  <section class="py-5 booking">
    <div class="container ">
      <div class="row text-center  text-white" id="counterSection">

        <div class="col">
          <h1 class="text-center" id="counter">200</h1>
          <p>Maid</p>
        </div>
        <div class="col">
          <h1 class="text-center" id="counter1">500</h1>
          <p>Happy Client</p>
        </div>
        <div class=" col">
          <h1>2023</h1>
          <p>Since</p>

        </div>


      </div>
    </div>
  </section>







  <!-- heading  second end -->

  <!-- accordian  strat-->
  <div class="container py-5">
    <div class="row">
      <div class="col m-3 text-center">
        <h3>FAQs</h3>
        <span class="line"></span>
      </div>
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-="flush-collapseOne">
            How can I hire a housemaid/babysitter/cook from Maid Mantra?
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>1: Choose your desired service, fill in your requirements and make a booking on our platform.</p>
            <p> 2: Confirm your requirements with the relationship manager assigned to you.</p>
            <p> 3: Sit tight while our relationship manager finds the right fit for your home.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-="flush-collapseTwo">
            Is a maid/cook/babysitter from Maid Mantra reliable?
          </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <p>Every Maid Mantra helper goes through a thorough background check using their Aadhar and police records,
              and
              is only sent to your homes after a successful vetting process.. </p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseThree" aria-expanded="false" aria-="flush-collapseThree">
            Is it safe to hire a maid/cook/babysitter during the pandemic?
          </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">In order to ensure your safety, every Maid Mantra helper goes through a RT-PCR
            test
            and are sent to your home via a private cab.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFour" aria-expanded="false" aria-="flush-collapseFour">
            How much will a cook/maid/babysitter cost in Ahemdabad?
          </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">The average wage of our helpers is completely dependent on your requirements and
            location. It can vary anywhere between ₹4,000 to ₹25,000/per month.</div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#flush-collapseFive" aria-expanded="false" aria-="flush-collapseFive">
            Why We As A Customer Should Prefer Maid Mantra Services?
          </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive"
          data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Maid Mantra provides best customer experience in hiring maids and other domestic
            help. Also we keep all our workers happy by providing maximum benefits to them, it makes them work
            professionally at the customer’s place.</div>
        </div>
      </div>
    </div>


  </div>
  <!-- accordian end -->
  <script src="./javascript/script.js"></script>
</body>

</html>
<?php include("./footer.php") ?>