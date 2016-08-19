<?php
echo "<h2>Reserving item from the '".$_POST["address"]."' location of '".$_POST["name"]. "'</h2>
<form action='customerWebservice.php' method='post'>";
include '../utility/databaseConnect.php';

echo "Item to reserve: <select name='id'>";
$sql = "SELECT i.id, i.name FROM ITEM as i JOIN CONTAINS as c ON i.id = c.id WHERE address='".$_POST["address"]."'";
$result = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($result)){
    echo "<option value='" . addslashes($row["id"]) . "'>" .  $row['id'].":".$row["name"] . "</option>";
}
echo "</select><br>
Number to reserve:<input type='text' name='quantity'><br>
<input type='hidden' name='name' value='".addslashes($_POST["name"])."'>
<input type='hidden' name='address' value='".addslashes($_POST["address"])."'>
<input type='hidden' name='username' value='".addslashes($_POST["username"])."'>
<input type='hidden' name='action' value='reserve'>
<input type='submit' value='submit'></form>";
?>
