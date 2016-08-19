<!DOCTYPE html>
<html lang="en">
<head>
<title>DiSCOVER ORGANiC</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script	src="js/jquery.touchSwipe.min.js"></script>
<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'fade',
        pagination: false, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: true,
        waitBannerAnimation: false,
        progressBar: false
    })
});
$(window).load(
    function () {
        $('.carousel1').carouFredSel({
            auto: false,
            prev: '.prev1',
            next: '.next1',
            width: 1030,
            items: {
                visible: {
                    min: 1,
                    max: 4
                },
                height: 'auto',
                width: 157,
            },
            responsive: true,
            scroll: 1,
            mousewheel: false,
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });
    });
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body class="page1">
<header>
  <div class="container_12">
    <div class="grid_12">
      <div class="h_phone">Need help? Call Us +1 (101) 101 CPSC</div>
      <h1><a href="index.php"><img src="images/logo.png" alt=""></a></h1>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="menu_block">
    <div class="container_12">
      <div class="grid_12">
          <?php
          session_start();

          if(!isset($_SESSION["username"])&&!isset($_SESSION["storename"]))
          {
              ?>
              <div class="autor"> <a href="login.html">Login</a> <a href="createAccount.html">Create account</a> </div>
              <?php
          }
          else
          {
              ?>
              <div class="autor">
                  <?php
                  if(isset($_SESSION["username"])) {
                      echo "Logged in as: ".$_SESSION["username"];
                  }
                  else {
                      echo "Logged in as: ".$_SESSION["storename"];
                  }
                  ?>
                  <a><a href="customer/logout.php">Logout</a> <a href="manageAccount.php">Manage my account</a> </div></a>
              <?php
          }
          ?>
        <nav class="">
          <ul class="sf-menu">
              <li class="current"><a href="index.php">Home</a></li>
              <li><a href="storesGeneral.php">Stores</a></li>
              <li class="with_ul"><a href="productsGeneral.php">Products</a>
                  <ul>
                <li>Sort By
                  <ul>
                    <li><a href="productsGeneral.php?sort=a">Alphabetical</a></li>
                    <li><a href="productsGeneral.php?sort=c">Category</a></li>
                    <li><a href="productsGeneral.php?sort=s">Store</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="contacts.php">Contacts</a></li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="slider-relative">
  <div class="slider-block">
    <div class="slider"> <a href="#" class="prev"></a> <a href="#" class="next"></a>
      <ul class="items">
        <li> <img src="images/slide.jpg" alt="">
          <div class="banner">Healthy life <br>
            <br>
            tastes delicious</div>
        </li>
        <li> <img src="images/slide1.jpg" alt="">
          <div class="banner">A new generation <br>
            <br>
            of farming</div>
        </li>
        <li> <img src="images/slide2.jpg" alt="">
          <div class="banner">Best food is<br>
            <br>
            natural food</div>
        </li>
        <li> <img src="images/slide3.jpg" alt="">
          <div class="banner">New agricultural <br>
            <br>
            technologies only</div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="content">
  <div class="black">
    <div class="page1_block">
      <div class="container_12">
        <div class="grid_12">
          <h2>Browse your local organic and<br>
            <br>
            <br>
            natural vendors now with ease!</h2>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
  <div class="gray">
    <div class="container_12">
      <div class="grid_12">
        <div class="car"> <a href="#" class="prev1"></a> <a href="#" class="next1"></a>
          <div class="car_div">
            <ul class="carousel1">
              <li><a href="#"><img src="images/logo1.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo2.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo3.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo4.png" alt=""></a></li>
              <li><a href="#"><img src="images/logo2.png" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_2">
      <div class="copy"> <a href="index.php" class="footer_logo"><img src="images/footer_logo.png"	alt=""></a> &copy; 2016 <a href="#">Privacy Policy</a> </div>
    </div>
    <div class="grid_2">
      <ul>
      </ul>
    </div>
    <div class="grid_2">
      <ul>
      </ul>
    </div>
    <div class="grid_2">
      <ul>
      </ul>
    </div>
    <div class="grid_3 prefix_1">
<!--      <h4>Newsletter</h4>
      <form id="newsletter" action="#">
        <div class="success">Your subscribe request has been sent!</div>
        <label class="email"> <span>Enter e-mail address</span>
          <input type="email" value="" >
          <a href="#" class="btn" data-type="submit">Subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
      </form>-->
    </div>
    <div class="clear"></div>
  </div>
  <div class="f_bot">
    <div class="container_12">
      <div class="grid_12">Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a> <br/>Edits by: DiSCOVER ORGANiC Inc.</div>
    </div>
  </div>
</footer>
</body>
</html>