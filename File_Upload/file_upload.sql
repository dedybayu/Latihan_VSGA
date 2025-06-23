CREATE DATABASE db_file_upload;

USE db_file_upload;

CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE files;

SELECT * FROM files;
