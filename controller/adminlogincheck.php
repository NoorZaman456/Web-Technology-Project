<?php
include('../model/admin.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (adminlogin($username, $password)) {
        echo 'success';
    } else {
        echo 'Invalid credentials!';
    }
}
?>
