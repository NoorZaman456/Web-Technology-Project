<?php 

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'hotel_management');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function adminLogin($username, $password) {
    $con = getConnection();
    $sql = "SELECT * FROM ad WHERE username = '{$username}' AND password = '{$password}'";
    $result = mysqli_query($con, $sql);
    return mysqli_num_rows($result) === 1;
}


// Admin functions for managing features

// Insert feature
function addAccessibilities($feature_title, $feature_description) {
    $con = getConnection();
    $sql = "INSERT INTO a (feature_title, feature_description) VALUES ('{$feature_title}', '{$feature_description}')";
    return mysqli_query($con, $sql);
}

// Update feature
function updateAccessibilities($id, $feature_title, $feature_description) {
    $con = getConnection();
    $sql = "UPDATE a SET feature_title='{$feature_title}', feature_description='{$feature_description}' WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Delete feature
function deleteAccessibilities($id) {
    $con = getConnection();
    $sql = "DELETE FROM a WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Fetch all features
function getAllAccessibilities() {
    $con = getConnection();
    $sql = "SELECT * FROM a";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fetch a feature by ID
function getAccessibilitiesById($id) {
    $con = getConnection();
    $sql = "SELECT * FROM a WHERE id={$id}";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

// Insert Highlight
function addHighlight($title, $description, $image_url) {
    $con = getConnection();
    $sql = "INSERT INTO highlights (title, description, image_url) VALUES ('{$title}', '{$description}', '{$image_url}')";
    return mysqli_query($con, $sql);
}

// Update Highlight
function updateHighlight($id, $title, $description, $image_url) {
    $con = getConnection();
    $sql = "UPDATE highlights SET title='{$title}', description='{$description}', image_url='{$image_url}' WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Delete Highlight
function deleteHighlight($id) {
    $con = getConnection();
    $sql = "DELETE FROM highlights WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Fetch all Highlights
function getAllHighlights() {
    $con = getConnection();
    $sql = "SELECT * FROM highlights";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fetch a Highlight by ID
function getHighlightById($id) {
    $con = getConnection();
    $sql = "SELECT * FROM highlights WHERE id={$id}";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

// Insert Hotel Policy
function addPolicies($policy_title, $policy_description) {
    $con = getConnection();
    $sql = "INSERT INTO hotel_policies (policy_title, policy_description) VALUES ('{$policy_title}', '{$policy_description}')";
    return mysqli_query($con, $sql);
}

// Update Hotel Policy
function updatePolicies($id, $policy_title, $policy_description) {
    $con = getConnection();
    $sql = "UPDATE hotel_policies SET policy_title='{$policy_title}', policy_description='{$policy_description}' WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Delete Hotel Policy
function deletePolicies($id) {
    $con = getConnection();
    $sql = "DELETE FROM hotel_policies WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Fetch all Hotel Policies
function getAllPolicies() {
    $con = getConnection();
    $sql = "SELECT * FROM hotel_policies";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fetch a Hotel Policy by ID
function getPoliciesById($id) {
    $con = getConnection();
    $sql = "SELECT * FROM hotel_policies WHERE id={$id}";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

// Insert FAQ
function addFAQ($question, $answer) {
    $con = getConnection();
    $sql = "INSERT INTO faqs (question, answer) VALUES ('{$question}', '{$answer}')";
    return mysqli_query($con, $sql);
}

// Update FAQ
function updateFAQ($id, $question, $answer) {
    $con = getConnection();
    $sql = "UPDATE faqs SET question='{$question}', answer='{$answer}' WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Delete FAQ
function deleteFAQ($id) {
    $con = getConnection();
    $sql = "DELETE FROM faqs WHERE id={$id}";
    return mysqli_query($con, $sql);
}

// Fetch all FAQs
function getAllFAQs() {
    $con = getConnection();
    $sql = "SELECT * FROM faqs";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Fetch an FAQ by ID
function getFAQById($id) {
    $con = getConnection();
    $sql = "SELECT * FROM faqs WHERE id={$id}";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

?>
