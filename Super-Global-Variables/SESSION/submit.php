<?php
// Sessions in PHP
// Sessions are a way to store data for a user in a server.
// Sessions are stored in the $_SESSION superglobal variable.

// How to start a session?
session_start();

// How to store data in a session?
$_SESSION["name"] = $_POST["name"];
$_SESSION["age"] = $_POST["age"];

// How to read data from a session?
echo $_SESSION["name"]; // Output: John
echo $_SESSION["age"]; // Output: 30

// How to unset a session?
session_unset();

// How to destroy a session?
session_destroy();
