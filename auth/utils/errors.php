<?php
session_start();
$errors = [];

function error($message): void
{
    global $errors;
    $errors[] = $message;
}

function error_and_redirect($error_type,$errors, $url): void
{
//    $_SESSION['errors'] = [];
    unset($_SESSION["errors"][$error_type]);
    $_SESSION["errors"][$error_type] = $errors;
    header("Location:../$url");
    exit();
}
function show_errors(): void
{
    global $errors;
    if (!empty($errors)) {
        echo '<div class="errors">';
        foreach ($errors as $error) {
            echo '<div class="error">' . $error . '</div>';
        }
        echo '</div>';
    }
}

function clear_errors(): void
{
    global $errors;
    $errors = [];
}
