<?php
require_once __DIR__.'/../config.php';

$servername =$config['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];

$conn = new \PDO("mysql:host=$servername",$username,$password);

try {
 $sql = "CREATE DATABASE IF NOT EXISTS $database";
 $conn->exec($sql);
 $conn->query("USE $database");
 $sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
 $conn->exec($sql);
    $sql = "INSERT INTO users (firstname, lastname, email,password)
VALUES ('John', 'Doe', 'admin@example.com','".password_hash('admin',PASSWORD_BCRYPT) ."')";
    $conn->exec($sql);
} catch (PDOException $e) {
echo $e->getMessage().'<br>';
}