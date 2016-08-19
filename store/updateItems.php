<?php
echo "<h2>Updating items at '".$_POST["address"]. "' location of '".$_POST["name"]. "'</h2>
<form action='storeWebservice.php' method='post'>";
include '../utility/databaseConnect.php';

echo "<h2>Required!!</h2>
Item to update: <select name='id'>";
$sql = "SELECT i.id, i.name FROM ITEM as i JOIN CONTAINS as c WHERE i.id = c.id AND c.name = '".$_POST["name"]."' AND c.address = '".$_POST["address"]."'";

$result = mysqli_query($con, $sql);

if(!$result)
    echo "Error: ".mysqli_error($con);
while ($row = mysqli_fetch_array($result)){
    echo "<option value='" . addslashes($row["id"]) . "'>" .  $row['id'].":".$row["name"] . "</option>";
}
echo "</select><br>
<h2>Optional</h2>
New number in stock:<input type='text' name='num_in_stock'><br>
New price: $<input type='number' name='price' min='0' max='9999' step='0.01' size='4'><br>
<input type='hidden' name='name' value='".addslashes($_POST["name"])."'>
<input type='hidden' name='address' value='".addslashes($_POST["address"])."'>
<input type='hidden' name='action' value='updateItems'>
<input type='submit' value='submit'></form>";
?>
