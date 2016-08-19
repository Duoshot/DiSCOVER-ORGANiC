<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="itemWebservice.php" method="post">
    <?php
    include '../utility/databaseConnect.php';
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
</body>
</html>