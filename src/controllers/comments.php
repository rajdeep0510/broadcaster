<?php
require_once __DIR__ . '/../models/connection.php';
require_once __DIR__ . '/../../config/config.ini.php';

$current_user = $_SESSION['username'];
$message_id = $_GET['id'] ?? null;

    if (!$message_id) {
    header('Location: /broadcaster/');
    exit;
}

try {
    $sql = "SELECT * FROM messages WHERE id = :message_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['message_id' => $message_id]);
    $message = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}


try {
    $sql = "SELECT * FROM comments WHERE user_id = :message_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['message_id' => $message_id]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
    exit;
}

try{
if(isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    $sql = "INSERT INTO comments (comment, user_id,) VALUES (:comment, :user_id,)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['comment' => $comment, 'user_id' => $current_user]);
    header('Location: /broadcaster/comments?');
    exit;
}
}
catch{
    
}




require 'src/views/comments.view.php';
?>