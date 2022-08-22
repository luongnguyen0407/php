<?php
// Connect to database
session_start();
$link = new mysqli("localhost", "root", "", "quanlyshop");
mysqli_set_charset($link, 'UTF8');
// Check connection
if (!$link) {
    die("Connecion failed: " . mysqli_connect_error());
}
