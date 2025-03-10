<?php
    session_start();

    // Initialize session variables if not set
    if (!isset($_SESSION['is_logged_in'])) {
        $_SESSION['is_logged_in'] = 0;
    }
    if (!isset($_SESSION['username'])) {
        $_SESSION['username'] = '';
    }
?>