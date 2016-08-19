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
            <div class="grid_12">
                <div class ="container">
                    <h3>Add an item</h3>

                    <form action="item/itemWebservice.php" method="post" enctype="multipart/form-data">
                        ID:<input type="number" name="id"><br>
                        Name:<input type="text" name="name"><br>
                        Description:<textarea name="description" cols="40" rows="1"></textarea><br>
                        Made in:<input type="text" name="made_in"><br>
                        Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload"><br>
                        <input type="submit" value="Submit" name="submit">
                        <input type="hidden" name = "action" value="add">
                    </form>
                
                    <h3>Modify an item</h3>
                    <form action="item/itemWebservice.php" method="post" enctype="multipart/form-data">
                        <?php
                            include '/utility/databaseConnect.php';
                            $sql = "SELECT id, name FROM ITEM";
                            $result = mysqli_query($con, $sql);

                            echo "Item to Update: <select name='id'>";
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" . addslashes($row["id"]) . "'>" . $row['id'].":".$row["name"] . "</option>";
                            }
                            echo "</select><br>";
                            ?>
                        New Name:<input type="text" name="name"><br>
                        New Description:<textarea name="description" cols="40" rows="5"></textarea><br>
                        New Made in:<input type="text" name="made_in"><br>
                        New image:<input type="file" name="fileToUpload" id="fileToUpload"><br>
                        <input type="submit" value="Submit" name="submit">
                        <input type="hidden" name = "action" value="update">
                    </form>
                    
                    <h3>Delete an item</h3>
                    <form action="item/itemWebservice.php" method="post">
                        <?php
                            include '/utility/databaseConnect.php';
                            $sql = "SELECT id, name FROM ITEM";
                            $result = mysqli_query($con, $sql);

                            echo "Item to delete: <select name='id'>";
                            while ($row = mysqli_fetch_array($result)){
                            echo "<option value='" . addslashes($row["id"]) . "'>" . $row['id'].":".$row["name"] . "</option>";
                            }
                            echo "</select><br>";
                        ?>
                        <input type="submit">
                        <input type="hidden" name="action" value="delete">
                    </form>
                    
                    <h3>Give item a category</h3>
                    <form action="item/itemWebservice.php" method="post">
                        <?php
                        include '/utility/databaseConnect.php';
                        $sql = "SELECT id, name FROM ITEM";
                        $result = mysqli_query($con, $sql);

                        echo "Item to Update: <select name='id'>";
                        while ($row = mysqli_fetch_array($result)){
                        echo "<option value='" . addslashes($row["id"]) . "'>" . $row['id'].":".$row["name"] . "</option>";
                        }
                        echo "</select><br>";
                        ?>
                        New Category: 
                        <select name="category">
                            <option value="food">Food</option>
                            <option value="dairy">Dairy</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="submit" value="Submit" name="submit">
                        <input type="hidden" name = "action" value="category">
                    </form>
                    
                    <h3>Remove category from item</h3>
                        <form action="item/removeCategory.php" method="post">
                                <?php
                                include '/utility/databaseConnect.php';
                                $sql = "SELECT id, name FROM ITEM";
                                $result = mysqli_query($con, $sql);

                                echo "Item to Update: <select name='id'>";
                                while ($row = mysqli_fetch_array($result)){
                                echo "<option value='" . addslashes($row["id"]) . "'>" . $row['id'].":".$row["name"] . "</option>";
                                }
                                echo "</select><br>";
                                ?>
                                <input type="submit" value="submit">

                        </form>
                
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