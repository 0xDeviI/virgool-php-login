<?php

session_start();

const USERNAME = 'admin';
const PASSWORD = 'ThisIsMyPassword';

if (isset($_POST["username"]) && isset($_POST["password"])) {
    header('Content-Type: application/json');
    if ($_POST["username"] === USERNAME && $_POST["password"] === PASSWORD) {
        $_SESSION["username"] = $_POST["username"];
        echo '{"status": "success", "message": "Login successful"}';
    } else {
        echo '{"status": "error", "message": "Login failed"}';
    }
} else {
    header('Content-Type: application/json');
    echo '{"status": "error", "message": "Missing username or password"}';
}

?>