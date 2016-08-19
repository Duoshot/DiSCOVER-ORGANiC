<!DOCTYPE html>
<html lang="en">
<head>
<title>DiSCOVER ORGANiC | Contacts</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/form.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/sForm.js"></script>
<script src="js/forms.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<header>
  <div class="container_12">
    <div class="grid_12">
      <div class="h_phone">Need Help? Call Us +1 (101) 101 CPSC</div>
      <h1><a href="index.php"><img src="images/logo.png" alt=""></a> </h1>
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
            <li><a href="index.php">Home</a></li>
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
            <li class="current"><a href="contacts.php">Contacts</a></li>
          </ul>
        </nav>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>
<div class="content">
  <div class="white wt2">
    <div class="container_12">
      <div class="grid_8">
        <h3>Contact Information</h3>
        <div class="map">
          <figure class="img_inner fleft">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2506.641736008504!2d-114.13799474854683!3d51.078163249716255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x53717db7481cb3b1%3A0x36aff4a9e3c803fb!2sUniversity+of+Calgary!5e0!3m2!1sen!2sca!4v1461024812014" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
          </figure>
          <div class="text2">DiSCOVER TEAM</div>
          <address>
          <dl>
            <dt>You can find us in the MS CPSC labs<br><br></dt>
          </address>
            <dd><span>Telephone:</span>+1 (101) 101 CPSC</dd><br>
            <dd><span>FAX:</span>+1 (101) 111 CPSC</dd><br>
            <dd>E-mail: <a href="#" class="link-1">CPSC471@manorievachon.com</a></dd>
          </dl>
          <address class="mb0">
          <dl>
          </dl>
          </address>
        </div>
      </div>
      <div class="grid_4">
        <h3>Contact Form</h3>
        <form id="form" action="#">
          <div class="success_wrapper">
            <div class="success">Contact form submitted!<br>
              <strong>We will be in touch soon.</strong> </div>
          </div>
          <fieldset>
            <label class="name">
              <input type="text" value="Name:">
              <br class="clear">
              <span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span> </label>
            <label class="email">
              <input type="text" value="E-mail:">
              <br class="clear">
              <span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span> </label>
            <label class="phone">
              <input type="tel" value="Phone:">
              <br class="clear">
              <span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>
            <label class="message">
              <textarea>Message:</textarea>
              <br class="clear">
              <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span> </label>
            <div class="clear"></div>
            <div class="btns"><a data-type="reset" class="btn">Clear</a><span></span><a data-type="submit" class="btn">Send</a>
              <div class="clear"></div>
            </div>
          </fieldset>
        </form>
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