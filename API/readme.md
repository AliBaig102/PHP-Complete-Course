# User Management API

## Project Overview

This project is a RESTful API built using PHP with PDO for database interactions. The API allows for managing user data, including creating, reading, updating, and deleting user records in a MySQL database.

### Features:
- **Create User:** Add a new user to the database.
- **Read Users:** Retrieve all users or fetch specific user details by ID.
- **Update User:** Modify existing user information.
- **Delete User:** Remove a user from the database.
- **Response Format:** All API responses are in JSON format, making it easy to integrate with front-end applications.

### Technologies Used:
- **PHP**: Backend logic for handling API requests.
- **PDO (PHP Data Objects)**: Database access layer for connecting to and querying the MySQL database.
- **MySQL**: Relational database for storing user data.

## Folder Structure

```bash
API/
├──config/
│ └── Connection.php # Database connection configuration
│ └── api.sql # API Sql File
│ └── api.sql # Users Functions
├── index.php # Main Working File
```

## Server Creation

###  **Local Development Server:**
- Start the built-in PHP server:
  ```bash
  php -S localhost:4000 -t public
  ```
- Access the API via `http://localhost:4000`.


## API Endpoints

### 1. **Get All Users**
- **Endpoint:** `GET /localost:4000/index.php`
- **Description:** Retrieve all users.
- **Response:**
  ```json
  {
    "status": "success",
    "message": "All Users",
    "data": [
      {
        "id": 1,
        "name": "John Doe",
        "email": "john@example.com",
        "created_at": "2024-08-15 12:00:00"
      }
    ]
  }
  ```

### 2. **Get User by ID**
- **Endpoint:** `GET /localost:4000/index.php?id={id}`
- **Description:** Retrieve a user by their ID.
- **Response (User Found):**
  ```json
  {
    "status": "success",
    "message": "User found",
    "data": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "created_at": "2024-08-15 12:00:00"
    }
  }
  ```
- **Response (User Not Found):**
  ```json
  {
    "status": "error",
    "message": "User not found",
    "data": null
  }
  ```

### 3. **Create User**
- **Endpoint:** `POST /localost:4000/index.php`
- **Description:** Create a new user.
- **Request Body:**
  ```json
  {
    "name": "Jane Doe",
    "email": "jane@example.com",
    "password": "123"
  }
  ```
- **Response:**
  ```json
  {
    "status": "success",
    "message": "User created successfully",
    "data": null
  }
  ```

### 4. **Update User**
- **Endpoint:** `PUT /localost:4000/index.php?id={id}`
- **Description:** Update an existing user by their ID.
- **Request Body:**
  ```json
  {
    "name": "Jane Doe Updated",
    "email": "jane_updated@example.com",
    "password": "12345"
  }
  ```
- **Response:**
  ```json
  {
    "status": "success",
    "message": "User updated successfully",
    "data": null
  }
  ```

### 5. **Delete User**
- **Endpoint:** `DELETE /localhost:4000/index.php?id={id}`
- **Description:** Delete a user by their ID.
- **Response:**
  ```json
  {
    "status": "success",
    "message": "User deleted successfully",
    "data": null
  }
  ```

## How to Use the API

1. **Testing the API:**
    - You can use tools like [Postman](https://www.postman.com/) or [cURL](https://curl.se/) to test the endpoints.

2. **Integrating the API:**
    - The API is ready to be consumed by any front-end or mobile application.

---

This documentation covers the essentials for setting up, using, and extending the User Management API built with PHP and PDO.

