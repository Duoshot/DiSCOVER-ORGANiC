<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<form action="locationWebservice.php" method="post">

    <!-- TODO: This PHP can be removed when the actual site is made, as we can grab the store name from the logged in store-->
    <?php
    include 'getStores.php';
    ?>
    Address: <input type="text" name="address"><br>
    Email: <input type="text" name="email"><br>
    Phone: <input type="number" name="phone"><br>
    Open Time: <input type="time" name="open_hours" value="00:00:00"><br>
    Closed Time: <input type="time" name="closed_hours" value="00:00:00"><br>
    <input type="hidden" name = "action" value="add">
    <input type="submit" value="submit">
</form>
</body>
</html>