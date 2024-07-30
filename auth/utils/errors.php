<?php
$errors = [];

function error($message): void
{
    global $errors;
    $errors[] = $message;
}

function error_and_redirect($errors, $url): void
{
    $key = key($errors);
//    convert string to url format
    $message = urlencode($errors[$key]);
    header("Location: $url" . "?error=" . $message . "&" . $key . "=" . $message);
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
