<?php
require_once __DIR__ . '/../models/connection.php';
require_once __DIR__ . '/../../config/config.ini.php';

$username = $_SESSION['username'];

try {
    $sql = "select u_name, full_name, bio, email from accounts where u_name = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) { 
    echo "Query failed: " . $e->getMessage();
}

try {
    $sql = "select message, created_at, m_username from messages where m_username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

require 'src/views/profile.view.php';
?> 