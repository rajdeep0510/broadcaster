<?php
// Load environment variables from .env file
$env = parse_ini_file('.env');

// Database connection settings
$host     = "aws-0-ap-southeast-1.pooler.supabase.com";
$port     = "6543";
$dbname   = "postgres"; // or your specific database name
$user     = "postgres.ywyitphhoecceksbekfc";
$password = "Raj@2005"; 

// Create the DSN
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

try {
    // Establish the connection
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!-- 
Replace these values with your actual Supabase database credentials
 -->
