<?php
session_start();
require_once __DIR__ . '/../models/connection.php';
require_once __DIR__ . '/../../config/config.ini.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: /broadcaster/login');
    exit;
}

$current_user = $_SESSION['username'];
$message_id = $_POST['message_id'] ?? $_GET['id'] ?? null;

if (!$message_id) {
    header('Location: /broadcaster/');
    exit;
}

// Handle comment posting
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    try {
        $comment = trim($_POST['comment']);
        if (!empty($comment)) {
            // Simple insert into comments table
            $sql = "INSERT INTO comments (comment, user_id) VALUES (:comment, :user_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'comment' => $comment,
                'user_id' => $current_user // Using the current user's username as user_id
            ]);
            
            header("Location: /broadcaster/message?id=" . $message_id);
            exit;
        }
    } catch (PDOException $e) {
        echo "Error posting comment: " . $e->getMessage();
        exit;
    }
}

// Fetch the message
try {
    $sql = "SELECT * FROM messages WHERE id = :message_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['message_id' => $message_id]);
    $message = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$message) {
        header('Location: /broadcaster/');
        exit;
    }
} catch (PDOException $e) {
    echo "Error fetching message: " . $e->getMessage();
    exit;
}

// Fetch comments for this message
try {
    $sql = "SELECT * FROM comments WHERE user_id = :message_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['message_id' => $message_id]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching comments: " . $e->getMessage();
    exit;
}

require 'src/views/comments.view.php';
?>