<?php
session_start();
require_once __DIR__ . '/../models/connection.php';
require_once __DIR__ . '/../helpers/dd.php';

if (!isset($_SESSION['username'])) {
    header('Location: /broadcaster/login');
    exit;
}

if (!isset($_POST['message_id'])) {
    header('Location: /broadcaster/comments?id=' . $message_id);
    exit;
}

$username = $_SESSION['username'];
$message_id = $_POST['message_id'];

try {
    // First get the current likes array
    $sql = "SELECT liked_users FROM messages WHERE id = :message_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['message_id' => $message_id]);
    $likes = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debug: Check if we got the message
    if (!$likes) {
        error_log("Message not found with ID: " . $message_id);
        header('Location: /broadcaster/comments?id=' . $message_id);
        exit;
    }

    // Initialize empty array if null or decode existing likes
    $likes_decoded = $likes['liked_users'] ? json_decode($likes['liked_users'], true) : [];

    // Debug: Log current state
    error_log("Current likes array: " . print_r($likes_decoded, true));
    error_log("Username trying to like: " . $username);

    if(!in_array($username, $likes_decoded)) {
        $likes_decoded[] = $username;
        $likes_encoded = json_encode($likes_decoded);

        // Debug: Log the update attempt
        error_log("Attempting to update with new likes: " . $likes_encoded);

        $sql = "UPDATE messages SET liked_users = :likes WHERE id = :message_id";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'likes' => $likes_encoded,
            'message_id' => $message_id
        ]);

        // Debug: Check if update was successful
        if (!$result) {
            error_log("Update failed. PDO Error Info: " . print_r($stmt->errorInfo(), true));
        } else {
            error_log("Update successful");
        }
        
        header('Location: /broadcaster/comments?id=' . $message_id);
        exit;
    }
    else {
        // Remove the like if user already liked
        $likes_decoded = array_values(array_filter($likes_decoded, function($user) use ($username) {
            return $user !== $username;
        }));
        
        $likes_encoded = json_encode($likes_decoded);

        // Debug: Log the unlike attempt
        error_log("Attempting to remove like with new array: " . $likes_encoded);

        $sql = "UPDATE messages SET liked_users = :likes WHERE id = :message_id";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([
            'likes' => $likes_encoded,
            'message_id' => $message_id
        ]);

        // Debug: Check if unlike was successful
        if (!$result) {
            error_log("Unlike update failed. PDO Error Info: " . print_r($stmt->errorInfo(), true));
        } else {
            error_log("Unlike update successful");
        }
        
        header('Location: /broadcaster/comments?id=' . $message_id);
        exit;
    }
}
catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    error_log("SQL State: " . $e->getCode());
    error_log("Error Info: " . print_r($e->errorInfo, true));
    header('Location: /broadcaster/comments?id=' . $message_id);
    exit;
}
?>
