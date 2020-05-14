<?php

// Create connection
$conn = mysqli_connect("localhost","root","","congthucnauan");
mysqli_set_charset($conn, "utf8");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// mysqli_close($conn);
?>