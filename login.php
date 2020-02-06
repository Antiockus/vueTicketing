<?php

use Doctrine\DBAL\DriverManager;

require "bootstrap.php";

if (empty($_POST['email'])) {
    echo 'email required';
    header('Location:/login');
}

$email = $_POST['email'];
$pass = $_POST['password'];

// $connectionParams = [
//     'dbname' => $_ENV['DB_NAME'],
//     'user' => $_ENV['DB_USER'],
//     'password' => $_ENV['DB_PASS'],
//     'host' => $_ENV['DB_HOST'],
//     'port' => $_ENV['DB_PORT'],
//     'driver' => 'pdo_mysql'
// ];

// $conn = DriverManager::getConnection($connectionParams);
$sql = "SELECT * FROM users WHERE email ='$email'";
$stmt = $conn->query($sql);
if ($row = $stmt->fetch()) {
    if (password_verify($pass, $row['password'])) {
        $user = new Antiockus\User($row['id']);
        header('Location:/view_tickets');
    } else {
        echo "incorrect password";
    }
} else {
    echo 'no one found';
}
