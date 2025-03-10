<?php
// Include the database connection
include_once __DIR__ . '/../models/connection.php';
include_once __DIR__ . '/../config/config.ini.php';


// sending the message to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $message = $_POST['message'];
    $username = $_SESSION['username']; // Get username from session
    try {
        $sql = "INSERT INTO messages (message, m_username) VALUES (:message, :username);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'message' => $message,
            'username' => $username
        ]);
        header('Location: /broadcaster/');
        exit;
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}

// fetching messages from the database
try {
    $sql = "SELECT id, message, m_username, created_at, liked_users FROM messages ORDER BY created_at DESC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();    
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

require 'src/views/home.view.php';
?>