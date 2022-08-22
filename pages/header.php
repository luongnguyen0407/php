<?php
require_once "config.php";

$user = isset($_SESSION['user']) ? $_SESSION['user'] : [];
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../style/main.css">

    <!-- CSS only -->
    <title>Iphone</title>
</head>

<body>
    <div class="main">
        <header class="header" data-aos="fade-down">
            <div class="container header-wrapper">
                <a href="./index.php"><img src="../img/logotgdd.png" alt="" class="header-logo"></a>
                <nav class="menu">
                    <ul class="menu-main">
                        <li class="menu-item">
                            <a href="./index.php" class="menu-link">Trang Chủ</a>
                        </li>
                        <li class="menu-item">
                            <a href="./sp.php" class="menu-link">Sản Phẩm</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">Chính Sách</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="menu-link">Liên Hệ</a>
                        </li>
                        <li class="menu-item-btn">
                            <div class="dropdown">
                                <button class="dropdown-btn">
                                    <?php echo isset($user["userName"]) ? $user["userName"] : "Đăng Ký" ?>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (empty($user)) {
                                    ?>
                                        <li><a class="dropdown-item" href="./signup.php">Đăng Ký</a></li>
                                        <li><a class="dropdown-item" href="./login.php">Đăng Nhập</a></li>
                                    <?php
                                    }
                                    if (isset($user["chucVu"]) && $user["chucVu"] == 1) {
                                    ?>
                                        <li><a class="dropdown-item" href="./admin/dashboad.php">Admin</a></li>
                                    <?php
                                    }
                                    if (!empty($user)) {
                                    ?>
                                        <li><a class="dropdown-item" href="./cart.php">Giỏ Hàng</a></li>
                                        <li><a class="dropdown-item" href="./logOut.php">Đăng Xuất</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
                <i class="fa-solid fa-bars bar"></i>
            </div>
        </header>