CREATE DATABASE webdev_agency;

USE webdev_agency;

CREATE TABLE developers (

    developer_id INT AUTO_INCREMENT PRIMARY KEY,

    developer_name VARCHAR(100) NOT NULL,

    specialty VARCHAR(100) NOT NULL

);

CREATE TABLE projects (

    project_id INT AUTO_INCREMENT PRIMARY KEY,

    developer_id INT,

    project_name VARCHAR(100) NOT NULL,

    client_name VARCHAR(100) NOT NULL,

    FOREIGN KEY (developer_id)
    REFERENCES developers(developer_id)
    ON DELETE CASCADE

);