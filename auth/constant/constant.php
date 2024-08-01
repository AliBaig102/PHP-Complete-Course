<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
use  Dotenv\Dotenv;

try {
    // load .env file
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    // application constants
    $application_name = $_ENV['APPLICATION_NAME'];
    $application_version = $_ENV['APPLICATION_VERSION'];
    $application_author = $_ENV['APPLICATION_AUTHOR'];
    $application_email = $_ENV['APPLICATION_EMAIL'];
    $application_description = $_ENV['APPLICATION_DESCRIPTION'];
    $application_keywords = $_ENV['APPLICATION_KEYWORDS'];
    $application_url = $_ENV['APPLICATION_URL'];


    // database constants
    $db_host = $_ENV['DB_HOST'];
    $db_user = $_ENV['DB_USER'];
    $db_pass = $_ENV['DB_PASS'];
    $db_name = $_ENV['DB_NAME'];

    // email constants
    $email_host = $_ENV['EMAIL_HOST'];
    $email_port = $_ENV['EMAIL_PORT'];
    $email_host_user = $_ENV['EMAIL_HOST_USER'];
    $email_host_password = $_ENV['EMAIL_HOST_PASSWORD'];
} catch (\Dotenv\Exception\InvalidPathException $e) {
    // Handle .env file error
    echo "Error loading .env file: " . $e->getMessage();
}