<?php
include "./header.php";
include "./check.php";
require_once "../config.php";
$id = $_GET['id'];
$sqlget = "SELECT * FROM sanpham WHERE maSanPham = $id ";
$qr = $link->query($sqlget);
$row = $qr->fetch_array();

if (isset($_GET['id']) && !empty($row)) {
    $sqldel = "DELETE FROM sanpham WHERE maSanPham = $id";
    $link->query($sqldel);
    if (is_file("../imgUp/" . $row["srcImg"])) {
        unlink("../imgUp/" . $row["srcImg"]);
    }
    header('location: ./listsp.php');
}
