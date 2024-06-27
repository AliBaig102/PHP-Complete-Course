<?php
// Secure Password Hashing in PHP
// SQL Injection attacks
// Secure String Functions

// ## SQL Injection Attacks
// What is SQL Injection?
// SQL injection is a web security vulnerability that allows an attacker to execute arbitrary SQL code. The attacker can use this code to gain access to your database.

// How to Prevent SQL Injection Attacks?
// 1. Use prepared statements
// 2. Validate user input
// 3. Use string functions

// Secure String Functions

// addslashes() => adds backslashes to a string
//Example
$string = "Hello World";
echo addslashes($string); //output: Hello\ World

// stripslashes() => removes backslashes from a string
//Example
$string = "Hello\\ World";
echo stripslashes($string); //output: Hello World

// htmlentities() => converts special characters to HTML entities
//Example
$string = "<script>alert('Hello World!');</script>";
echo htmlentities($string); //output: &lt;script&gt;alert(&#039;Hello World!&#039;);&lt;/script&gt;

//html_entity_decode() => decodes HTML entities
//Example
$string = "&lt;script&gt;alert(&#039;Hello World!&#039;);&lt;/script&gt;";
echo html_entity_decode($string); //output: <script>alert('Hello World!');</script>


// ## Secure Password Hashing in PHP

//md5() => returns the MD5 hash of a string
//Example
$string = "Hello World";
echo md5($string); //output: 8b1a9953c4611296a827abf8c47897e8

//sha1() => returns the SHA1 hash of a string
//Example
$string = "Hello World";
echo sha1($string); //output: 0a4d55a8d778e5022fab701977c5d840bbc486d0

//password_hash() => returns a password hash
//Example
$string = "Hello World";
echo password_hash($string, PASSWORD_DEFAULT); //output: $2y$10$SsQOv6qoCjO0LW7ZLs9XsO6zDZgN5Q4bTJgXqKQq7sW5l0nVZ51G6

//password_verify() => verifies a password hash
//Example
$string = "Hello World";
echo password_verify($string, '$2y$10$SsQOv6qoCjO0LW7ZLs9XsO6zDZgN5Q4bTJgXqKQq7sW5l0nVZ51G6'); //output: true
