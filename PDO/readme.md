# PDO CRUD Application

## Project Overview

This project is a simple PHP application demonstrating CRUD (Create, Read, Update, Delete) operations using PHP Data Objects (PDO) to interact with a MySQL database. The application manages user records, allowing for viewing, adding, updating, and deleting users.

### Features:
- **Create:** Add new users to the database.
- **Read:** View a list of users and individual user details.
- **Update:** Modify existing user information.
- **Delete:** Remove users from the database.

### Technologies Used:
- **PHP**: Server-side scripting language used for building the application.
- **PDO (PHP Data Objects)**: Provides a uniform way to access different databases.
- **MySQL**: Relational database management system for storing user data.
- **HTML/CSS**: For structuring and styling the web pages.

## Database Setup

1. **Create the Database:**
    - Open your MySQL client (e.g., phpMyAdmin, MySQL Workbench) and execute the following SQL commands:
      ```sql
      CREATE DATABASE pdo_crud;
      USE pdo_crud;
      
      CREATE TABLE users (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(100) NOT NULL,
          email VARCHAR(100) NOT NULL,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      );
      ```

2. **Configure the Database Connection:**
    - Edit the `database/connection.php` file with your MySQL connection details. Ensure that the `host`, `db_name`, `username`, and `password` are correctly set.

## Server Creation

1. **Serve the Application Locally:**
    - Use PHP’s built-in server for local development:
      ```bash
      php -S localhost:8000
      ```
    - Access the application via `http://localhost:8000` in your web browser.

2. **Deploying to a Web Server:**
    - Upload the project files to your web server.
    - Ensure the server supports PHP and has access to a MySQL database.
    - Configure the `config/database.php` file with the appropriate connection details for your production database.

## Folder Structure

```bash
PDO/
├──database/
│ └── config.php # Database connection configuration
├──classes/
│ └── users.php # User class with CRUD operations
├──css/
   └── styles.css # CSS file for basic styling
├── create.php # Page to create a new user
├── index.php # Main page to list all users
├── read.php # Page to view a single user's details
├── update.php # Page to update an existing user's information
├── delete.php # Script to delete a user
```
---

This documentation provides an overview of the PDO CRUD application, including database setup, server creation, and the updated folder structure. Adjustments may be necessary based on your specific environment and requirements.