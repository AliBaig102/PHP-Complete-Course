<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "crud";
$connection = mysqli_connect($host, $user, $pass, $db) or die("Error connecting to database " . mysqli_connect_error());
