<?php
include('../model/usermodel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkIfUsernameExists($username)) {
        echo "Username already exists!";
    } else {
        if (addUser($name, $contact_no, $password, $username)) {
            echo "Registration successful! <br>
             <a href='../view/home.html'>Welcome</a>";
        } else {
            echo "Error in registration.";
        }
    }
}
?>
