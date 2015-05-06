<?php
$dsn = 'mysql:host=localhost;dbname=class_scheduler';
$username = 'admin';
$password = 'password';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error = $e->getMessage();
    include('errors/error.php');
    exit();
}
?>