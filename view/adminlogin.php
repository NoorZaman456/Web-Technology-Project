<?php
// Database connection and required model
include('../model/admin.php');
session_start();

// Admin login logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming a separate admin check based on a role or a specific table
    $isAdmin = login($username, $password) && isAdmin($username);

    if ($isAdmin) {
        $_SESSION['admin'] = $username;
        header('Location: dasboard.php');
    } else {
        echo 'Invalid admin credentials!';
    }
}
?>