<?php

// What is a cookie?
// A cookie is a small piece of data that a website stores on a user's computer.

// How to set a cookie?
// Set a cookie using the setcookie() function.
// setcookie(name, value, expire, path, domain, secure, httponly);
// name: The name of the cookie
// value: The value of the cookie
// expire: The time the cookie should expire
// path: The path the cookie should be available on
// domain: The domain the cookie should be available on
// secure: Whether the cookie should only be available over secure connections
// httponly: Whether the cookie should only be available over HTTP connections

// Example
// setcookie("name", "John", time() + (86400 * 30), "/");
// Delete a cookie
// setcookie("name", "", time() - 3600, "/");

// How to read a cookie?
// Read a cookie using the $_COOKIE superglobal variable.
// $_COOKIE[name]
// name: The name of the cookie

// Example
echo $_COOKIE["name"];
