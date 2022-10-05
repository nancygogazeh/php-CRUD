<?php
//Create database connection
$mysqli = mysqli_connect("localhost","root","","employee");

if (!$mysqli) {

die("Connection error: " . mysqli_connect_error());

}
?>