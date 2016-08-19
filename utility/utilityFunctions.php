<?php

    function getTable($con, $table, $qualifications = "")
    {
        $sql = "SELECT * FROM $table $qualifications";
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            echo "Query: $sql<br>";
            var_dump($_POST);
            return false;
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function getLocations($con, $store)     // gets all locations for a given store
    {
        return getTable($con, "LOCATION", "WHERE name='$store'");
    }
    
    function getContains($con, $id)     // gets all contains for given id
    {
        return getTable($con, "CONTAINS", "WHERE id='$id' ORDER BY name");
    }
    
    function getReservations($con, $username)     // gets all contains for given id
    {
        return getTable($con, "RESERVES", "WHERE username='$username'");
    }
    
    function getReservationsStore($con, $name)     // gets all contains for given id
    {
        return getTable($con, "RESERVES", "WHERE name='$name'");
    }

    function getItem($con, $id) // gets a specific item
    {

        return getTable($con, "ITEM", "WHERE id = '$id'")[0];
    }

    function getLocationitem($con, $name, $address) // gets all items at a given location
    {
        $sql = "SELECT i.name, i.id, i.description, i.made_in, i.picture, l.name AS sname, l.address FROM 
                ITEM as i, LOCATION as l, CONTAINS as c WHERE l.name = c.name AND l.address = c.address AND i.id = c.id AND l.name ='$name' AND l.address = '$address'";
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            echo "Query: $sql<br>";
            var_dump($_POST);
            return false;
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function getStoreItems($con) // Gets all items paired with the stores they appear in
    {
        $sql = 'SELECT DISTINCT i.name, i.id, i.description, i.made_in, i.picture, s.name AS sname FROM ITEM as i, STORE as s, CONTAINS as c WHERE i.id = c.id AND c.name = s.name ORDER BY s.name';
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            echo "Query: $sql<br>";
            var_dump($_POST);
            return false;
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }


?>