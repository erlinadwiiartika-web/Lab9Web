
CREATE DATABASE IF NOT EXISTS db_latihan
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_latihan;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO users (nama, email) VALUES
('Erlina Dwi Artika', 'erlina@example.com'),
('Rina Pelita', 'rina@example.com'),
('Budi Santoso', 'budi@example.com');
