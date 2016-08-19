<!DOCTYPE html>
<html lang="en">
<head>
<title>DiSCOVER ORGANiC | Products</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/sForm.js"></script>
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
                        <li class="current" class="with_ul"><a href="productsGeneral.php">Products</a>
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
<div class="content">
    <div class="white wt3">
        <div class="container_12">
            <div class="grid_3 prefix_1">
                <div class="blog_search">
                    <h5>Search</h5>
                    <form id="form1" action="#">
                        <span>Enter keywords</span>
                        <input type="text" name="search" value="" >
                        <a onClick="document.getElementById('form1').submit()" href="#"></a>
                    </form>
                </div>
            </div>

            <?php
            include 'utility/databaseConnect.php';
            include 'utility/utilityFunctions.php';

            $qualifications = "";
            $sort = null;
            if(!empty($_GET['sort'])) {
                $sort = $_GET['sort'];
                switch ($sort)
                {
                    case 'a':
                        $qualifications = 'ORDER BY name';
                        break;
                    case 'c':
                        $qualifications = 'NATURAL JOIN CATEGORY ORDER BY category';
                        break;
                }

            }
            

            if(!empty($_GET["search"]))
            {
                $keyword = $_GET["search"];
                $qualifications = "WHERE name LIKE '%$keyword%'";
            }
            if($sort == 's')
                $rows = getStoreItems($con);
            elseif (!empty($_POST["address"]) && !empty($_POST["name"]))
                $rows = getLocationitem($con, $_POST["name"], $_POST["address"]);
            else
                $rows = getTable($con, 'ITEM', $qualifications);

            if (!empty($_POST["address"]) && !empty($_POST["name"])) {
                $name = $_POST["name"];
                $address = $_POST["address"];
                echo "<div class='grid_12'>
                <h3>Products from '$name' at '$address' location</h3>
                </div>
                <div class='clear'></div>";
            }
            else{
                echo "<div class='grid_12'>
                <h3>Our Products</h3>
                </div>
                <div class='clear'></div>";
            }

            $currentHeading = null;
            foreach ($rows as $row) {
                if($sort == 'c')
                {
                    if($row['category'] != $currentHeading)
                    {
                        $currentHeading = $row['category'];
                        echo "<div class='grid_12'><h4>".$currentHeading."</h4></div>";
                    }
                }
                elseif($sort == 's')
                {
                    if($row['sname'] != $currentHeading)
                    {
                        $currentHeading = $row['sname'];
                        echo "<div class='grid_12'><h4>".$currentHeading."</h4></div>";
                    }
                }

                $id = $row['id'];
                $imagePath = 'item/uploads/'.$row['picture'];
                $name = $row['name'];
                $description = $row['description'];
                $made_in = $row['made_in'];
                echo "<div class='grid_5'> <img src='$imagePath' alt='' class='img_inner fleft' style='width:304px;height:228px;'>
                <div class='extra_wrapper'>
                    <p class='col1'><b>$name</b><br>Made in: $made_in</p>
                    $description<br>";
                    if(isset($_SESSION["username"]))
                    {
                        echo "<a href='itemReservation.php?id=$id' class='btn'>Reserve</a> </div>
                        </div>";
                    }
                    else if(isset($_SESSION["storename"]))
                    {
                        echo "<a href='itemStore.php?id=$id' class='btn'>Add</a> </div>
                        </div>";
                    }
                    else
                    {
                        echo "<a href='login.html' class='btn'>Login for more</a> </div>
                        </div>";
                    }
            }
            ?>
            <div class="clear"></div>
            <br>
            <br>
            <br>
            <br>
            <?php
                if(isset($_SESSION["storename"]))
                {   
                    echo "<a href = 'itemManager.php' class = 'btn'>Manage Items</a>";
                }
                else
                {
                    
                }
                ?>
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
<!--            <h4>Newsletter</h4>
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