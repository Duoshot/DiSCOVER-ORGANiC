
<?php
	// Updates a customer in the database. Returns false
	// if the update failed.
	function updateCustomer($con, $username, $updating)
	{

		$sql = "UPDATE CUSTOMER SET ";
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

		$sql .= " WHERE username='$username'";

		$result = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0)
			return true;
		else
			return false;
	}

	function deleteCustomer($con, $username)
	{
		$sql = "DELETE FROM CUSTOMER WHERE username='$username'";
		$result = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0)
			return true;
		else
			return false;

	}

	function addCustomer($con, $username, $email, $password)
	{
		$sql = "INSERT INTO CUSTOMER (username, email, password) VALUES ('". $username."','". $email ."','".$password."')";
		if (!mysqli_query($con,$sql))
			return false;
		else
			return true;
	}

	function addSubscription($con, $username, $name, $emailNotifications)
	{
		$sql = "INSERT INTO SUBSCRIBES_TO (username, name, email_notifications) VALUES ('$username', '$name', '$emailNotifications')";

		if (!mysqli_query($con,$sql))
			return false;
		else
			return true;
	}

	function deleteSubscription($con, $username, $name)
	{
		$sql = "DELETE FROM SUBSCRIBES_TO WHERE username='$username' AND name='$name'";
		$result = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) > 0)
			return true;
		else
			return false;
	}

	function toggleNotifications($con, $username, $name)
	{
		$sql = "SELECT * FROM SUBSCRIBES_TO WHERE name='$name' AND username='$username' ";
		$result = mysqli_query($con, $sql);
		if(!$result)
		{
			return false;
		}

		$row = mysqli_fetch_array($result);
		$newValue = $row["email_notifications"] == 1 ? 0 : 1;


		$sql = "UPDATE SUBSCRIBES_TO SET email_notifications='$newValue' WHERE username='$username' AND name='$name'";

		$result = mysqli_query($con, $sql);
		if(!$result)
			return false;
		else
			return true;
	}

	function reserveItem($con, $username, $id, $address, $name, $quantity, $date_reserved = null, $date_picked_up = null)
    {
        if($date_reserved == null)
            $date_reserved = date("Y-m-d H:i:s");
        $date_picked_up = date_create("1000-01-01 00:00:00");
        $sql = "INSERT INTO RESERVES (username, id, address, name, quantity, date_reserved, date_picked_up) VALUES ('$username', '$id', '$address', '$name', '$quantity', '$date_reserved', '".date_format($date_picked_up,"Y-m-d H:i:s")."')";
        if(!mysqli_query($con, $sql))
            return false;
        else
            return true;
    }

    function cancelReservation($con, $username, $id, $address, $name)
    {
        $sql = "DELETE FROM RESERVES WHERE name='$name' AND username='$username' AND id='$id' AND address='$address'";
        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }