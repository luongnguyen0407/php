<?php
require_once "../config.php";
include "./header.php";
include "./check.php";
$sql_kh = "SELECT COUNT(idKH) as total FROM khachhang;";
$sql_hd = "SELECT COUNT(maHoaDon) as total FROM hoadon";
$sql_sp = "SELECT COUNT(maSanPham) as total FROM sanpham";
$khach_hang = $link->query($sql_kh)->fetch_assoc();
$san_pham = $link->query($sql_sp)->fetch_assoc();;
$hoa_don = $link->query($sql_hd)->fetch_assoc();;


?>

<div class="content-memo">
    <aside class="container aside">
        <ul class="list-menu">
            <li class="active">
                <a href="#"><i class="ti-stats-up"></i> Dashboard</a>
            </li>
            <li>
                <a href="./addsp.php"><i class="ti-pencil-alt"></i> Thêm sản phẩm </a>
            </li>
            <li>
                <a href="./listsp.php"><i class="ti-gallery"></i> sản phẩm </a>
            </li>
            <li>
                <a href="#"><i class="ti-user"></i> thành viên </a>
            </li>
        </ul>
    </aside>

    <div class="content-main">
        <div class="count-web">
            <a href="#" class="cart-count" style="background-color: red ;">
                <p>Thành Viên</p>
                <span><?= $khach_hang['total'] ?></span>
            </a>
            <a href="./listsp.php" class="cart-count" style="background-color: green ;">
                <p>Sản Phẩm</p>
                <span><?= $san_pham['total'] ?></span>
            </a>
            <a href="#" class="cart-count" style="background-color: rgb(198, 195, 13);">
                <p>Đơn Hàng</p>
                <span><?= $hoa_don['total'] ?></span>
            </a>

        </div>
        <canvas id="line-chart" width="800" height="450"></canvas>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="../../js/chart.js"></script>

</body>

</html>