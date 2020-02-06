<?php

use Doctrine\DBAL\DriverManager;
use Antiockus\Router;

require 'bootstrap.php';

$errors = [];
$sql = "INSERT INTO USERS ( nickname, email, password)  VALUES (?,?,?)";
$connectionParams = [
    'dbname' => $_ENV['DB_NAME'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'port' => $_ENV['DB_PORT'],
    'driver' => 'pdo_mysql'
];
$conn = DriverManager::getConnection($connectionParams);

$nickname = htmlspecialchars($_POST['nickname']);
$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if (empty($nickname) || empty($email) || empty($password)) {
    $twig->render('register.html', ['errors' => 'All fields must be supplied']);
    exit;
}




$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $_POST['nickname']);
$stmt->bindParam(2, $_POST['email']);
$stmt->bindParam(3, $hashed_password);
$stmt->execute();


header('Location:/dashboard');
