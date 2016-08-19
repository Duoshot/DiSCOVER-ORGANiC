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
<div class="content">
    <div class="white wt3">
        <div class="container_12">
            
            <h3> Update items </h3>
            
            <div class="container">
            <?php
            include 'utility/databaseConnect.php';
            include 'utility/utilityFunctions.php';
            $storename = $_SESSION["storename"];
            
            $locations = getLocations($con, $storename);
            foreach ($locations as $location) {
                $address = $location['address'];

                echo "<h4>Update item at location: '$address'</h2>
                <form action='store/storeWebservice.php' method='post'>";
                include '/utility/databaseConnect.php';

                echo "
                Item to update: <select name='id'>";
                $sql = "SELECT i.id, i.name FROM ITEM as i JOIN CONTAINS as c WHERE i.id = c.id AND c.name = '$storename' AND c.address = '$address'";

                $result = mysqli_query($con, $sql);

                if(!$result)
                    echo "Error: ".mysqli_error($con);
                while ($row = mysqli_fetch_array($result)){
                    echo "<option value='" . addslashes($row["id"]) . "'>" .  $row['id'].":".$row["name"] . "</option>";
                }
                echo "</select><br>
                New number in stock:<input type='text' name='num_in_stock'><br>
                New price: $<input type='number' name='price' min='0' max='9999' step='0.01' size='4'><br>
                <input type='hidden' name='address' value='$address'>
                <input type='hidden' name='action' value='updateItems'>
                <input type='hidden' name='name' value='".$_SESSION["storename"]."'>
                <input type='submit' value='Update'></form>";
            }
            ?>

            <h3>Remove Items</h3>
                
            <?php
            include 'utility/databaseConnect.php';
            $storename = $_SESSION["storename"];
            
            $locations = getLocations($con, $storename);
            foreach ($locations as $location) {
                $address = $location['address'];

                echo "<h4>Delete item at location: '$address'</h2>
                <form action='store/storeWebservice.php' method='post'>";
                include '/utility/databaseConnect.php';

                echo "
                Item to delete: <select name='id'>";
                $sql = "SELECT i.id, i.name FROM ITEM as i JOIN CONTAINS as c WHERE i.id = c.id AND c.name = '$storename' AND c.address = '$address'";

                $result = mysqli_query($con, $sql);

                if(!$result)
                    echo "Error: ".mysqli_error($con);
                while ($row = mysqli_fetch_array($result)){
                    echo "<option value='" . addslashes($row["id"]) . "'>" .  $row['id'].":".$row["name"] . "</option>";
                }
                echo "</select><br>
                <input type='hidden' name='address' value='$address'>
                <input type='hidden' name='name' value='".$_SESSION["storename"]."'>
                <input type='hidden' name='action' value='deleteItems'>
                <input type='submit' value='Delete'></form>";
            }
            ?>
                
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
            <h4>Newsletter</h4>
            <form id="newsletter" action="#">
                <div class="success">Your subscribe request has been sent!</div>
                <label class="email"> <span>Enter e-mail address</span>
                    <input type="email" value="" >
                    <a href="#" class="btn" data-type="submit">Subscribe</a> <span class="error">*This is not a valid email address.</span> </label>
            </form>
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