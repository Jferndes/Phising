CREATE DATABASE login_db;

USE login_db;

CREATE TABLE users_logins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
