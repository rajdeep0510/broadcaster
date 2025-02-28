<?php
session_start();

require_once __DIR__ . '/../models/connection.php';
require_once __DIR__ . '/../../config/config.ini.php';   

$error = ''; // Variable to store error message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // First, get the user and their hashed password
        $sql = "SELECT * FROM accounts WHERE u_name = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && $user['password'] === $password) { // In production, use password_verify()
            $_SESSION['is_logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: /broadcast/');
            exit;
        } else {
            $error = "Invalid username or password!";
        }
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}

// Pass the error to the view
require_once __DIR__ . '/../views/login.views.php';
?>