
<?php

session_start();

$isRoleValid = isset($_SESSION['role']);
$isEmailValid = isset($_SESSION['session_email']);
$isUserIdValid = isset($_SESSION['user_id']);
$isSessionValid = isset($_SESSION['session_id']);

$isAuthenticated = $isRoleValid && $isEmailValid && $isUserIdValid && $isSessionValid;

$isTechnician = $_SESSION['role'] >= 1 && $_SESSION['role'] <= 2 && $isRoleValid;
$isAdmin = $_SESSION['role'] == 1 && $isRoleValid;
$isUser = $_SESSION['role'] >= 0 && $isRoleValid;

$userEmail = $isEmailValid ? $_SESSION['session_email'] : "";
$userId = $isUserIdValid ? $_SESSION['user_id'] : "";
?>