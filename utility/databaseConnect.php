<?php
// Create connection
$con=mysqli_connect("localhost","manoriev_root","D!5cover0rganic","manoriev_DiSCOVER-ORGANiC");
// Check connection
if (!$con)
{
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}