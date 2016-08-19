
<?php
// Start the session
    session_start();
    
    
    if(!isset($_SESSION["username"]))
    {
        echo "Not logged in XD";
        ?> <br>
        <a href ='login.php'>Login</a> <br>
        <a href ='customer/addCustomer.html'>Register</a> <br>
    <?php
    }
    else
    {
        echo "Logged in as: " .$_SESSION['username'];
        echo "<script> alert(\"Logged in as: \"); </script>";
        ?>
        <br>
        <a href ='customer/updateCustomer.html'>Manage my account</a> <br>
        <a href ='logout.php'>Logout</a><br>
        <?php
    }
    
?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet">
    </head>
<body>
    

    <br>
    
    <a href ='index.php'>CLICK ME TO GO BACK TO DATABASE </a>
    
    <br>
    <?php
    include 'utility/databaseConnect.php';

    //TODO: put this in a webservice file and return an array instead of printing stuff

    $table = 'ITEM';
    $sql = "SELECT * FROM ".$table;
    $result = mysqli_query($con,$sql);
    if(!$result)
    {
        echo "Query: $sql<br>";
        var_dump($_POST);
        die("Error: ".mysqli_error($con));
    }

    echo "<h2>Viewing $table table:</h2>";
    echo "<table>";
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        foreach($row as $field => $value) {
            if(!is_int($field))
            {
                echo "<td><b>$field</b> ->";
                if($field == "picture")
                {
                    echo "<img src='../item/uploads/$value' alt='$value' style='width:304px;height:228px;'>";
                }
                else
                {
                    echo "$value";
                }
            }

        }
        echo '</tr>';
    }
    echo "</table>";
    mysqli_close($con);
    ?>

</body>
</html>

