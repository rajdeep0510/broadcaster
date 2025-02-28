<?php

require_once __DIR__ . '/../models/connection.php';

$error = ''; // Initialize error variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $confirm_password = $_POST['confirm_password'];
    $fullname = $_POST['fullname'];
    $bio = $_POST['bio'];


    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        try {
            $sql = "INSERT INTO accounts (u_name, password, email, full_name, bio) 
                   VALUES (:username, :password, :email, :fullname, :bio)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'username' => $username, 
                'password' => $password, 
                'email' => $email, 
                'fullname' => $fullname, 
                'bio' => $bio
            ]);
            // start and config session
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['is_logged_in'] = 1;

            // Redirect 
            header('Location: /broadcast/login/');
            exit;
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
            if ($e->getCode() == 23505) {
                $error = "Username already exists!";
            }
        }
    }
}

// Show the view last
require_once __DIR__ . '/../views/register.views.php';
?>
