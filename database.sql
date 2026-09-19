CREATE DATABASE IF NOT EXISTS student_system;
USE student_system;

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(150) NOT NULL,
    program VARCHAR(150) NOT NULL,
    is_archived TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO students (student_id, name, program) VALUES
('2026-0001','Juan Dela Cruz','BS Information Technology'),
('2026-0002','Maria Santos','BS Computer Science');
