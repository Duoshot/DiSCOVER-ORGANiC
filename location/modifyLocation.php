<?php

    function addLocation($con, $name, $address, $email, $phone, $open_hours, $closed_hours)
    {
        $sql = "INSERT INTO LOCATION (address, name, email, phone, open_hours, closed_hours) VALUES ('$address', '$name', '$email', '$phone', '$open_hours', '$closed_hours')";
        if (!mysqli_query($con,$sql))
            return false;
        else
            return true;
    }
    function deleteLocation($con, $name, $address)
    {
        $sql = "DELETE FROM LOCATION WHERE address='$address' AND name='$name'";
        mysqli_query($con, $sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }
    function updateLocation($con, $name, $address, $updating)
    {
        $sql = "UPDATE LOCATION SET ";
        $emailSet = false;
        $phoneSet = false;
        $openHoursSet = false;

        if(!empty($updating["email"]))
        {
            $sql .= "email='".$updating["email"]."'";
            $emailSet = true;
        }
        if(!empty($updating["phone"]))
        {
            if($emailSet)
                $sql .= ",";
            $sql .= "phone='".$updating["phone"]."'";
            $phoneSet = true;
        }
        if(!empty($updating["open_hours"]))
        {
            if($emailSet || $phoneSet)
                $sql .= ",";
            $sql .= "open_hours='".$updating["open_hours"]."'";
            $openHoursSet = true;
        }
        if(!empty($updating["closed_hours"]))
        {
            if($emailSet || $phoneSet || $openHoursSet)
                $sql .= ",";
            $sql .= "closed_hours='".$updating["closed_hours"]."'";
        }

        $sql .= " WHERE name='$name' AND address='$address'";

        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }