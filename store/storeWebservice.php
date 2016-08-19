<?php

session_start();
include '../utility/databaseConnect.php';
include 'modifyStore.php';


/*
 * REQUIRES: $name
 */
if($_POST["action"] == "delete")
{
    $name = $_POST["name"];

    if(deleteStore($con, $name))
    {
        echo "Deleted store '$name' successfully!";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }

}
/*
 * REQUIRES: $name, $email, $password
 */
else if($_POST["action"] == "add")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(addStore($con, $name, $email, $password))
    {
        echo "<script> alert(\"Thank you for creating a store, $name! Press OK to continue\") </script>";
        $_SESSION["storename"] = $name;
        echo "<script> location.href = \"../homeLoggedInStore.php\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
/*
 * REQUIRES: $name
 * OPTIONAL: $email, $password
 */
else if($_POST["action"] == "update")
{
    $updating = array();
    $name = $_POST["name"];

    if(!empty($_POST["email"]))
        $updating["email"] =  $_POST["email"];
    if(!empty($_POST["password"]))
        $updating["password"] = $_POST["password"];

    if(updateStore($con, $name, $updating))
    {
        echo "<script> alert(\"Info changed! Press OK to continue\") </script>";
        echo "<script> location.href = \"../manageAccount.php\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "items")
{
    $name = $_POST["name"];
    $address = $_POST["address"];
    $id = $_POST["id"];
    $num_in_stock = $_POST["num_in_stock"];
    $price = $_POST["price"];

    if(addItems($con, $name, $address, $id, $num_in_stock, $price))
    {
        //echo "Successfully added item with ID '$id' to store '$name's' location at $address!";
        echo "<script> alert(\"ISuccessfully added item with ID $id to store $name's location at $address!\") </script>";
        echo "<script> location.href = \"../itemStore.php?id=$id\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "updateItems")
{
    $updating = array();
    $id = $_POST["id"];
    $address = $_POST["address"];
    $name = $_POST["name"];

    if(!empty($_POST["num_in_stock"]))
        $updating["num_in_stock"] = $_POST["num_in_stock"];
    if(!empty($_POST["price"]))
        $updating["price"] = $_POST["price"];

    if(updateItems($con, $id, $address, $name, $updating))
    {
        echo "Successfully updated item with ID '$id' in store '$name's' location at $address!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "deleteItems")
{
    $name = $_POST["name"];
    $address = $_POST["address"];
    $id = $_POST["id"];
    
    if(deleteItems($con, $id, $address, $name))
    {
            echo "Successfully deleted item with ID '$id' in store '$name's' location at $address!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
    
}



mysqli_close($con);