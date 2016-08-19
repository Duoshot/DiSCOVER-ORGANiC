<?php
include '../utility/databaseConnect.php';
include 'modifyItem.php';

    //TODO: All 'die' statements should be replaced with proper error handling
    //       Sidenote: We should do input validation on the html side too

    function handlePictureAdd($returnValue, $filename)
    {
        // NOTE: Error handling here is dubious at best.
        switch($returnValue)
        {
            case 0:
                echo "File '$filename' uploaded successfully!";
                break;
            case 1:
                die( "Error: File chosen is not an image.");
                break;
            case 2:
                die( "Error: File already exists.");
                break;
            case 3:
                die( "Error: File exceeds the limit of 500kb.");
                break;
            case 4:
                die( "Error: Only JPG, JPEG, PNG & GIF files are allowed.");
                break;
            case 5:
                die("Error: An unknown error occurred when uploading.");
                break;
        }
        echo "<br>";
    }

/*
 * REQUIRES: $id
 */
if($_POST["action"] == "delete")
{
    $id = $_POST["id"];

    if(deleteItem($con, $id))
    {
        //echo "Deleted item with ID '$id' successfully!";
        echo "<script> alert(\"Successfully deleted item with id $id!\") </script>";
        echo "<script> location.href = \"../itemManager.php\"; </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }

}
/*
 * $REQUIRES: $id, $description, $name, $made_in, $fileToUpload
 */
else if($_POST["action"] == "add")
{
    $fileToUpload = $_FILES["fileToUpload"];
    $id = $_POST["id"];
    $description = $_POST["description"];
    $name = $_POST["name"];
    $made_in = $_POST["made_in"];

    $pictureResult = addItemPicture($fileToUpload);
    handlePictureAdd($pictureResult, $fileToUpload["name"]);

    if(addItem($con, $id, addslashes($fileToUpload["name"]), addslashes($description), addslashes($name), addslashes($made_in)))
    {
        echo "<script> alert(\"Successfully added item $name!\") </script>";
        echo "<script> location.href = \"../itemManager.php\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
/*
 * REQUIRES: $id
 * OPTIONAL: $name, $description, $made_in, $fileToUpload
 */
else  if($_POST["action"] == "update")
{
    $updating = array();
    $id = $_POST["id"];

    // TODO: HERE IS WHERE TO ADD REAL ERROR HANDLING IF ITEM DOESN'T EXIST
    if(!checkExists($con, $id))
        die("Error: No item with ID $id exists.");

    if(!empty($_POST["name"]))
        $updating["name"] =  $_POST["name"];
    if(!empty($_POST["description"]))
        $updating["description"] = $_POST["description"];
    if(!empty($_POST["made_in"]))
        $updating["made_in"] = $_POST["made_in"];
    if(!empty($_FILES["fileToUpload"]["name"]))
    {
        $pictureResult = addItemPicture($_FILES["fileToUpload"]);
        handlePictureAdd($pictureResult, $_FILES["fileToUpload"]["name"]);
        $picturePath = getItemPicturePath($con, $id);
        if(!$picturePath)
            die("Error getting the old file");
        chmod($picturePath, 0777);
        if(!unlink($picturePath))
           die("There was an error removing the old picture for the item with ID $id");

        $updating["picture"] = $_FILES["fileToUpload"]["name"];
    }

    if(updateItem($con, $id, $updating))
    {
        echo "<script> alert(\"Successfully updated item $id!\") </script>";
        echo "<script> location.href = \"../itemManager.php\"; </script>";
        
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
/*
 * REQUIRED: $id, $category
 * 
 * TODO: The flow for this is weird. Should be able to add multiple categories when adding the item. Not sure how to do this in HTML.
 */
else if($_POST["action"] == "category")
{
    $id = $_POST["id"];
    $category = $_POST["category"];
    
    if(addCategory($con, $id, $category))
    {
        //echo "Successfully added '$category' category to item with ID '$id'!";
        echo "<script> alert(\"Successfully added $category category to item with ID $id!\") </script>";
        echo "<script> location.href = \"../itemManager.php\"; </script>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "deleteCategory")
{
    $id = $_POST["id"];
    $category = $_POST["category"];

    if(deleteCategory($con, $id, $category))
    {
        //echo "Removed category '$category' from item with ID '$id' successfully!";
        echo "<script> alert(\"Removed category $category from item with ID $id successfully!\") </script>";
        echo "<script> location.href = \"../itemManager.php\"; </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }
}

mysqli_close($con);