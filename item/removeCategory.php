
<?php
echo"<h2>For Item with ID '" . $_POST["id"] ."'</h2>
Remove Category:<form action='itemWebservice.php' method='post'>";
include '../utility/databaseConnect.php';
$sql = "SELECT id, category FROM CATEGORY WHERE id='".$_POST["id"]."'";
$result = mysqli_query($con, $sql);

echo "<select name='category'>";
while ($row = mysqli_fetch_array($result)){
    echo "<option value='" . addslashes($row["category"]) . "'>" . $row["category"] . "</option>";
}
echo "</select><br><input type='hidden' name='action' value='deleteCategory'> 
<input type='hidden' name='id' value='".$_POST["id"]."'>
<input type='submit' value='submit'></form>";
?>