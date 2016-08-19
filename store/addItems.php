<?php
echo "<h2>Adding item to locations of '".$_POST["name"]. "'</h2>
<form action='storeWebservice.php' method='post'>";
include '../utility/databaseConnect.php';
$sql = "SELECT address FROM LOCATION WHERE name='".addslashes($_POST["name"])."'";
$result = mysqli_query($con, $sql);

echo "Location to Update: <select name='address'>";
while ($row = mysqli_fetch_array($result)){
    echo "<option value='" . addslashes($row["address"]) . "'>" . $row["address"] . "</option>";
}
echo "</select><br>
Item to add: <select name='id'>";
$sql = "SELECT id, name FROM ITEM";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)){
    echo "<option value='" . addslashes($row["id"]) . "'>" .  $row['id'].":".$row["name"] . "</option>";
}
echo "</select><br>
Number in stock:<input type='text' name='num_in_stock'><br>
Price: $<input type='number' name='price' min='0' max='9999' step='0.01' size='4'><br>
<input type='hidden' name='name' value='".addslashes($_POST["name"])."'>
<input type='hidden' name='action' value='items'>
<input type='submit' value='submit'></form>";
?>
