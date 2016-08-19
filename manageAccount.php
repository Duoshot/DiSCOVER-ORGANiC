<?php
    session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>DiSCOVER ORGANiC | Login</title>
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
                <!-- <div class="socials"><a href="#"></a><a href="#"></a></div>-->
                <div class="autor"> <a href="customer/logout.php">Logout</a> </div>
                <nav class="">
                    <ul class="sf-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="storesGeneral.php">Stores</a></li>
                        <li class="with_ul"><a href="productsGeneral.php">Products</a>
                            <ul>
                                <li><a href="productsGeneral.php">Sort By</a>
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
  <div class="black bl1">
    <div class="container_12">
      <div class="grid_8">
        <h3> </h3>
        <img src="images/page2_img1.jpg" alt="" class="img_inner fleft">
        <div class="extra_wrapper">

            <?php
                if(isset($_SESSION["username"]))
                {   
                    echo "<a href =\"customerReservations.php\" class =\"btn\">My Reservations</a>";
                    ?>
                        <h3>Manage Account</h3>
                        <form name ="login" style="display : inline" action="customer/customerWebservice.php" method="post" onsubmit = "return validateForm()">
                            <label class="login"> <span>Please enter new email or password:</span></br></br></span>
                            <input type="text" name="email" placeholder="New Email" id="username" /> </br></br>
                            <input type="password" name="password" placeholder="New Password" id="password" /> </br></br>
                            <input type="hidden" name="username" value="<?php echo $_SESSION["username"]?>">
                            <input type="hidden" name="action" value="update">
                         <!--   <a href="#" class="btn" data-type="submit">Submit</a></label>-->
                              <button> Submit </button></label>
                        </form>
                    <br><br>
                    
                        <h3>Current subscriptions</h3> 
                            <?php  include 'utility/databaseConnect.php';
                            $username = $_SESSION["username"];
                            $sql = "SELECT st.name
                                    FROM SUBSCRIBES_TO as st
                                    WHERE st.username = '$username'";
                            $result = mysqli_query($con,$sql);
                            
                            if(!$result)
                            {
                                echo "Query: $sql<br>";
                                var_dump($_POST);
                                die("Error: ".mysqli_error($con));
                            }
                            echo "<table>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                foreach($row as $field => $value) {
                                    if(!is_int($field))
                                    {
                                            echo "$value";
                                    }
                                }
                                echo "<br>";
                                echo '</tr>';
                            }
                            echo "</table>";
                          
                            $sqlSub = "SELECT s.name
                                    FROM STORE as s
                                    WHERE s.name NOT IN ($sql)";
                            $resultSub = mysqli_query($con, $sqlSub);

                            echo "<form action=\"customer/customerWebservice.php\" method=\"post\">";
                            echo "<h3>New subscription:</h3> <select name='name'>";
                            while ($row = mysqli_fetch_array($resultSub)){
                                echo "<option value='" . addslashes($row["name"]) . "'>" . $row["name"] . "</option>";
                            }
                            echo "</select><br>";
                            ?>
                        
                            Email notifications? <input type="checkbox" name="emailNotifications" value="true"><br>
                            <input type='hidden' name='username' value='<?php echo $_SESSION["username"] ?>'>
                            <input type="hidden" name = "action" value="subscribe">
                            <input type="submit" value="Subscribe">
                            </form>
                            
                            <?php
                            
                            $sqlDel = "SELECT name
                                    FROM SUBSCRIBES_TO
                                    WHERE username = '$username'";
                            $resultDel = mysqli_query($con, $sqlDel);

                            echo "<form action=\"customer/customerWebservice.php\" method=\"post\">";
                            echo "<h3>Remove Subscription:</h3> <select name='name'>";
                            while ($row = mysqli_fetch_array($resultDel)){
                                echo "<option value='" . addslashes($row["name"]) . "'>" . $row["name"] . "</option>";
                            }
                            echo "</select><br>";
                            ?>

                            <input type='hidden' name='username' value='<?php echo $_SESSION["username"] ?>'>
                            <input type="hidden" name = "action" value="unsubscribe">
                            <input type="submit" value="Unsubscribe">
                            </form>
                            
                            
                <?php
                }
                else if (isset($_SESSION["storename"]))
                    {
                    echo "<a href =\"storeContains.php\" class =\"btn\">Manage my items</a>";
                    echo "<a href =\"customerReservations.php\" class =\"btn\">See reservations</a>";
                    ?>
                        <h3>Manage Account</h3>
                        <form name ="login" style="display : inline" action="store/storeWebservice.php" method="post" onsubmit = "return validateForm()">
                            <label class="login"> <span>Please enter new email or password:</span></br></br></span>
                            <input type="text" name="email" placeholder="New Email" id="username" /> </br></br>
                            <input type="password" name="password" placeholder="New Password" id="password" /> </br></br>
                            <input type='hidden' name='name' value='<?php echo $_SESSION["storename"] ?>'>
                            <input type="hidden" name="action" value="update">
                         <!--   <a href="#" class="btn" data-type="submit">Submit</a></label>-->
                            <button>Submit</button></label>
                        </form>
                            
                            <h3> Current Locations </h3>
                            <?php  
                                include 'utility/databaseConnect.php';
                                $username = $_SESSION["storename"];
                                $sql = "SELECT address, email, phone, open_hours, closed_hours
                                        FROM LOCATION
                                        WHERE name = '$username'";
                                $result = mysqli_query($con,$sql);

                                if(!$result)
                                {
                                    echo "Query: $sql<br>";
                                    var_dump($_POST);
                                    die("Error: ".mysqli_error($con));
                                }
                                echo "<table>";
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<tr>';
                                    foreach($row as $field => $value) {
                                        if(!is_int($field))
                                        {
                                                echo "<b>$field</b> $value <br>";
                                        }
                                    }
                                    echo "<br>";
                                    echo '</tr>';
                                }
                                echo "</table>";
                            
                            ?>
                            
                            <h3> Add Location</h3>    
                            
                            <form action="location/locationWebservice.php" method="post">
                                Address: <input type="text" name="address"><br>
                                Email: <input type="text" name="email"><br>
                                Phone: <input type="number" name="phone"><br>
                                Open Time: <input type="time" name="open_hours" value="00:00:00"><br>
                                Closed Time: <input type="time" name="closed_hours" value="00:00:00"><br>
                                <input type="hidden" name = "action" value="add">
                                <input type="hidden" name="name" value="<?php echo $_SESSION["storename"]?>">
                                <input type="submit" value="Add Location">
                            </form>

                            <h3> Update Location </h3>
                            
                            <form action="location/locationWebservice.php" method="post">
                                
                                <?php
                                include 'utility/databaseConnect.php';
                                $storename = $_SESSION["storename"];
                                $sql = "SELECT address
                                        FROM LOCATION
                                        WHERE name = '$storename'";
                                $result = mysqli_query($con, $sql);

                                //echo "<form action=\"customer/customerWebservice.php\" method=\"post\">";
                                echo "Address: <select name='address'>";
                                while ($row = mysqli_fetch_array($result)){
                                    echo "<option value='" . addslashes($row["address"]) . "'>" . $row["address"] . "</option>";
                                }
                                echo "</select><br>";
                                ?>
                                New Email: <input type="text" name="email"><br>
                                New Phone: <input type="number" name="phone"><br>
                                New Open Time: <input type="time" name="open_hours" ><br>
                                New Closed Time: <input type="time" name="closed_hours" ><br>
                                <input type="hidden" name="name" value="<?php echo $_SESSION["storename"]?>">
                                <input type="hidden" name = "action" value="update">
                                <input type="submit" value="Update Location">
                            </form>
                            
                            <h3> Remove Location </h3>
                            
                            <form action="location/locationWebservice.php" method="post">

                            <?php
                                include 'utility/databaseConnect.php';
                                $storename = $_SESSION["storename"];
                                $sql = "SELECT address
                                        FROM LOCATION
                                        WHERE name = '$storename'";
                                $result = mysqli_query($con, $sql);

                                //echo "<form action=\"customer/customerWebservice.php\" method=\"post\">";
                                echo "Address: <select name='address'>";
                                while ($row = mysqli_fetch_array($result)){
                                    echo "<option value='" . addslashes($row["address"]) . "'>" . $row["address"] . "</option>";
                                }
                                echo "</select><br>";
                                ?>
                                <input type="hidden" name = "action" value="delete">
                                <input type="hidden" name="name" value="<?php echo $_SESSION["storename"]?>">
                                <input type="submit" value="Remove Location">
                            </form>
                    <?php
                }
            ?>
        </div>
      </div>
      <div class="grid_4">
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