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
    <input type="hidden" name = "action" value="delete">
    <input type="submit" value="submit">
</form>
</body>
</html>