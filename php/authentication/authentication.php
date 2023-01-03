
<?php

session_start();

$isRoleValid = isset($_SESSION['role']);
$isEmailValid = isset($_SESSION['session_email']);
$isSessionValid = isset($_SESSION['session_id']);

$isAuthenticated = $isRoleValid && $isEmailValid && $isSessionValid;

$isTechnician = $isRoleValid ? $_SESSION['role'] > 0 : false;
$isAdmin = $isRoleValid ? $_SESSION['role'] == 1 : false;
$isUser = $isRoleValid ? $_SESSION['role'] == 0 : false;

$userEmail = $isEmailValid ? $_SESSION['session_email'] : "";

?>