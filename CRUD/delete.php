<?php

require "dbConnection.php";
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: select.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}