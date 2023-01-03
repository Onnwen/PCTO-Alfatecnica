<?php
session_start();

if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);
}

if (isset($_SESSION['session_email'])) {
    unset($_SESSION['session_email']);
}

if (isset($_SESSION['role'])) {
    unset($_SESSION['role']);
}
exit;
?>
