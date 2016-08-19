<?php
include '../utility/databaseConnect.php';
$sql = "SELECT name FROM STORE";
$result = mysqli_query($con, $sql);

echo "Owning store: <select name='name'>";
while ($row = mysqli_fetch_array($result)){
    echo "<option value='" . addslashes($row["name"]) . "'>" . $row["name"] . "</option>";
}
echo "</select><br>";