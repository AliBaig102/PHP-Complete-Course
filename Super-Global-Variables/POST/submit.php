<?php

// How To Get All GET Data

echo "<pre>";
print_r($_POST);
echo "</pre>";

// How To Get Data By Key

echo $_POST['name'];
echo  $_POST['age'];

// $_REQUEST is a super-global variable that contains all the data sent to the server either via GET or POST methods.

echo $_REQUEST['name'];
echo  $_REQUEST['age'];

// $_SERVER is a super-global variable that contains information about the server.

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

echo $_SERVER['PHP_SELF'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER['HTTP_HOST'];
echo $_SERVER['HTTP_REFERER'];
echo $_SERVER['HTTP_USER_AGENT'];
echo $_SERVER['SCRIPT_NAME'];