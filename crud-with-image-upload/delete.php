<?php
require "database/connection.php";
$id = $_GET['id'];
$query = "DELETE FROM products WHERE id = $id";
mysqli_query($connection, $query);
unlink("images/" . $_GET['old_image_name']);
header("Location: index.php");