<?php
//including the database connection file
include("../config.php");
require_once '../parameters.php';

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location:".base_url."Views/index.php");
?>

