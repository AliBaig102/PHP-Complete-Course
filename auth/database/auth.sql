create database if not exists crud;
use crud;
drop table if exists auth;
CREATE TABLE auth (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(100) NOT NULL,
      email VARCHAR(100) UNIQUE NOT NULL,
      password VARCHAR(255) NOT NULL,
      verification_code VARCHAR(255),
      code_expiration TIMESTAMP,
      is_verified BOOLEAN DEFAULT FALSE,
      reset_token VARCHAR(255),
      token_expiration TIMESTAMP,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
