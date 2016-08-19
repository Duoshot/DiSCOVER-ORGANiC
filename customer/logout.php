<?php

session_start(); //to ensure you are using same session
session_unset();
session_destroy(); //destroy the session
echo '<body bgcolor="#000000"><H2 style="color:white; text-align:center;">You have been logged out!<br><a color:white href="../index.php">Continue back to homepage</a></H2></body>';
?>

