<?php
include 'databaseConnect.php';
include 'utilityFunctions.php';

$table = $_POST["table"];
$rows = getTable($con, $table);

echo "<h2>Viewing $table table:</h2>";
echo "<table>";
foreach ($rows as $row) {
    echo '<tr>';
    foreach($row as $field => $value) {
        echo "<td><b>$field</b> ->";
        if($field == "picture")
        {
            echo "<img src='../item/uploads/$value' alt='$value' style='width:304px;height:228px;'>";
        }
        else
        {
            echo "$value";
        }
    }
    echo '</tr>';
}
echo "</table>";
mysqli_close($con);