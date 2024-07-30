<?php
$errors = [];

function error($message): void
{
    global $errors;
    $errors[] = $message;
}

function error_and_redirect($error_type,$errors, $url): void
{
//    convert array to string
    $errors = http_build_query($errors);

    header("Location: ../$url" . "?" . $error_type . "&" . $errors);
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
