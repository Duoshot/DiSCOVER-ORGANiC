<?php
    function addItemPicture($fileToUpload)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($fileToUpload["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($fileToUpload["tmp_name"]);
            if($check == false) {
                return 1;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            return 2;
        }
        // Check file size (limit is 500kb atm)
        if ($fileToUpload["size"] > 500000) {
            return 3;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            return 4;
        }
        // if everything is ok, try to upload file

        if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
            return 0;
        } else {
            return 5;
        }
    }

    function checkExists($con, $id)
    {
        $result = mysqli_query($con, "SELECT * FROM ITEM WHERE id = '$id'");
        if(mysqli_num_rows($result) == 0)
            return false;
        else
            return true;
    }

    function addItem($con, $id, $picture, $description, $name, $made_in)
    {
        $sql = "INSERT INTO ITEM (id, picture, description, name, made_in) VALUES ('$id', '$picture', '$description', '$name', '$made_in')";
        if (!mysqli_query($con,$sql))
            return false;
        else
            return true;
    }

    function getItemPicturePath($con, $id)
    {
        $sql2 = "SELECT picture FROM ITEM WHERE id='$id'";


        // Getting picture
        $result = mysqli_query($con, $sql2);
        if(!$result)
            return false;

        $row = mysqli_fetch_array($result);
        $picturePath = "uploads/".$row["picture"];

        return $picturePath;
    }

    function deleteItem($con, $id)
    {
        $sql = "DELETE FROM ITEM WHERE id='$id'";

        $picturePath = getItemPicturePath($con, $id);
        if(!$picturePath)
            return false;

        // Deleting entry from table
        mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) < 0)
            return false;

        // Deleting picture from storage
        chmod($picturePath, 0777);
        if(!unlink($picturePath))
            return false;

        return true;
    }

    function updateItem($con, $id, $updating)
    {

        $sql = "UPDATE ITEM SET ";
        $nameSet = false;
        $descriptionSet = false;
        $madeinSet = false;

        if(!empty($updating["name"]))
        {
            $sql .= "name='".$updating["name"]."'";
            $nameSet = true;
        }
        if(!empty($updating["description"]))
        {
            if($nameSet)
                $sql .= ",";
            $sql .= "description='".$updating["description"]."'";
            $descriptionSet = true;
        }
        if(!empty($updating["made_in"]))
        {
            if($nameSet || $descriptionSet)
                $sql .= ",";
            $sql .= "made_in='".$updating["made_in"]."'";
            $madeinSet = true;
        }
        if(!empty($updating["picture"]))
        {
            if($nameSet || $descriptionSet || $madeinSet)
                $sql .= ",";
            $sql .= "picture='".$updating["picture"]."'";
        }

        $sql .= " WHERE id='$id'";

        $result = mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) > 0)
            return true;
        else
            return false;
    }

    function addCategory($con, $id, $category)
    {
        $sql = "INSERT INTO CATEGORY (id, category) VALUES ('$id', '$category')";
        if (!mysqli_query($con,$sql))
            return false;
        else
            return true;
    }

    function deleteCategory($con, $id, $category)
    {
        $sql = "DELETE FROM CATEGORY WHERE id='$id' AND category='$category'";
        mysqli_query($con,$sql);
        if(mysqli_affected_rows($con) < 0)
            return false;
        else
            return true;
    }

?>