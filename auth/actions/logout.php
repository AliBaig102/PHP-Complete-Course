<?php
require_once dirname(__DIR__) . '/utils/auth-functions.php';
require_once dirname(__DIR__) . '/utils/functions.php';
session_start();
if (is_user_logged_in()) {
    session_unset();
    session_destroy();
}
redirect("index.php");
