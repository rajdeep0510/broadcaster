<?php

try {
    $host = getenv('DB_HOST') ?: "aws-0-ap-southeast-1.pooler.supabase.com";
    $port = getenv('DB_PORT') ?: "6543";
    $dbname = getenv('DB_NAME') ?: "postgres";
    $user = getenv('DB_USER') ?: "postgres.ywyitphhoecceksbekfc";
    $password = getenv('DB_PASSWORD') ?: "Raj@2005";

    // Create the DSN for PostgreSQL
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    // Establish the connection
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

