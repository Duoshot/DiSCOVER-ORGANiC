<?php

session_start();
include '../utility/databaseConnect.php';
include 'modifyLocation.php';

/*
 * REQUIRED: $address, $name, $email, $phone, $open_hours, $closed_hours
 */
if($_POST["action"] == "add")
{
    $address = $_POST["address"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $open_hours = $_POST["open_hours"];
    $closed_hours = $_POST["closed_hours"];

    if(addLocation($con, $name, $address, $email, $phone, $open_hours, $closed_hours))
    {
        echo "<script> alert(\"Successfully added location at $address to the Store '$name'!\") </script>";
        echo "<script> location.href = \"../manageAccount.php\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
/*
 * REQUIRED: $address, $name
 */
else if($_POST["action"] == "delete")
{
    $name = $_POST["name"];
    $address = $_POST["address"];
    if(deleteLocation($con, $name, $address))
    {
        echo "<script> alert(\"Deleted location at '$address' from store '$name' successfully!\") </script>";
        echo "<script> location.href = \"../manageAccount.php\"; </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }
}
/*
 * REQUIRES: $name, $address
 * OPTIONAL: $email, $phone, $open_hours, $closed_hours
 */
else if($_POST["action"] == "update")
{
    $updating = array();
    $name = $_POST["name"];
    $address = $_POST["address"];

    if(!empty($_POST["email"]))
        $updating["email"] =  $_POST["email"];
    if(!empty($_POST["phone"]))
        $updating["phone"] = $_POST["phone"];
    if(!empty($_POST["open_hours"]))
        $updating["open_hours"] = $_POST["open_hours"];
    if(!empty($_POST["closed_hours"]))
        $updating["closed_hours"] = $_POST["closed_hours"];

    if(updateLocation($con, $name, $address, $updating))
    {
        echo "<script> alert(\"Successfully updated location at '$address' from Store '$name'!\") </script>";
        echo "<script> location.href = \"../manageAccount.php\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}

mysqli_close($con);