<?php
session_start();
require_once __DIR__ . '/../models/connection.php';
require_once __DIR__ . '/../../config/config.ini.php';

// Get the username from the URL parameter
$username = $_GET['user'] ?? null;

if (!$username) {
    echo "No username provided!";
    exit;
}

try {
    // Fetch user details based on the username
    $sql = "SELECT u_name, full_name, bio, email FROM accounts WHERE u_name = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found!";
        exit;
    }
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}

try {
    // Fetch messages of the user
    $sql = "SELECT message, created_at, m_username FROM messages WHERE m_username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}

// Load profile view
require 'src/views/profile.view.php';
?>
