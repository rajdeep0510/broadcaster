<?php
// Include the database connection
include_once 'src/models/connection.php';

try {
    // SQL query
    $sql = "SELECT * FROM messages ORDER BY created_at DESC;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();    
    // Fetch all messages
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}

require 'src/views/home.view.php';
?>