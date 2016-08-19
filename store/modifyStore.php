<?php
    // Updates a customer in the database. Returns false
    // if the update failed.
    function updateStore($con, $name, $updating)
    {

        $sql = "UPDATE STORE SET ";
        $emailSet = false;

        if(!empty($updating["email"]))
        {
            $sql .= "email='".$updating["email"]."'";
            $emailSet = true;
        }
        if(!empty($updating["password"]))
        {
            if($emailSet)
                $sql .= ",";
            $sql .= "password='".$updating["password"]."'";
        }

        $sql .= " WHERE name='$name'";

        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }

    function deleteStore($con, $name)
    {
        $sql = "DELETE FROM STORE WHERE name='$name'";
        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;

    }

    function addStore($con, $name, $email, $password)
    {
        $sql = "INSERT INTO STORE (name, email, password) VALUES ('". $name."','". $email ."','".$password."')";
        if (!mysqli_query($con,$sql))
            return false;
        else
            return true;
    }

    function addItems($con, $name, $address, $id, $num_in_stock, $price)
    {
        $sql = "INSERT INTO CONTAINS (id, address, name, num_in_stock, price) VALUES ('$id','$address','$name','$num_in_stock', '$price')";
        if (!mysqli_query($con,$sql))
            return false;
        else
            return true;
    }

    function updateItems($con, $id, $address, $name, $updating)
    {
        $sql = "UPDATE CONTAINS SET ";
        $numInStockSet = false;

        if(!empty($updating["num_in_stock"]))
        {
            $sql .= "num_in_stock='".$updating["num_in_stock"]."'";
            $numInStockSet = true;
        }
        if(!empty($updating["price"]))
        {
            if($numInStockSet)
                $sql .= ",";
            $sql .= "price='".$updating["price"]."'";
        }

        $sql .= " WHERE id='$id' AND address='$address' AND name='$name'";

        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }

    function deleteItems($con, $id, $address, $name)
    {
        $sql = "DELETE FROM CONTAINS WHERE id ='$id' AND address='$address' AND name='$name'";
        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }