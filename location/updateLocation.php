<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="locationWebservice.php" method="post">

    <!-- TODO: This PHP can be removed when the actual site is made, as we can grab the store name from the logged in store-->
    <h2>Required:</h2>
    <?php
    include 'getStores.php';
    ?>
    Address: <input type="text" name="address"><br>
    <h2>Optional:</h2>
    New Email: <input type="text" name="email"><br>
    New Phone: <input type="number" name="phone"><br>
    New Open Time: <input type="time" name="open_hours" ><br>
    New Closed Time: <input type="time" name="closed_hours" ><br>
    <input type="hidden" name = "action" value="update">
    <input type="submit" value="submit">
</form>
</body>
</html>