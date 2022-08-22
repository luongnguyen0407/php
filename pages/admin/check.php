<?php

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
if (!isset($_SESSION['user']) || $user['chucVu'] != 1) {
    header('location: ../login.php');
}
