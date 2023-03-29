
<?php

abstract class UserRoles
{
    const User = 0;
    const Admin = 1;
    const Technician = 2;
}

session_start();

$isRoleValid = isset($_SESSION['role']);
$isEmailValid = isset($_SESSION['session_email']);
$isUserIdValid = isset($_SESSION['user_id']);
$isSessionValid = isset($_SESSION['session_id']);

$isAuthenticated = $isRoleValid && $isEmailValid && $isUserIdValid && $isSessionValid;

$isTechnician = $_SESSION['role'] >= 1 && $_SESSION['role'] <= 2 && $isRoleValid;
$isAdmin = $_SESSION['role'] == 1 && $isRoleValid;
$isUser = $_SESSION['role'] >= 0 && $isRoleValid;

$currentRole = null;

switch ($_SESSION['role']) {
    case UserRoles::User:
        $currentRole = UserRoles::User;
        break;
    case UserRoles::Technician:
        $currentRole = UserRoles::Technician;
        break;
    case UserRoles::Admin:
        $currentRole = UserRoles::Admin;
        break;
    default:
        # Logga il problema, il ruolo resta null
        trigger_error("User role was not recognized! Setting it to NULL", E_USER_WARNING);
}

$userEmail = $isEmailValid ? $_SESSION['session_email'] : "";
$userId = $isUserIdValid ? $_SESSION['user_id'] : "";
?>