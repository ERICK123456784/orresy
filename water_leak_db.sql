CREATE DATABASE IF NOT EXISTS water_leak_db;
USE water_leak_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    email VARCHAR(100),
    is_verified BOOLEAN DEFAULT 0,
    security_question VARCHAR(255),
    security_answer VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS leaks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,
    image_path VARCHAR(255),
    submitted_by VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);