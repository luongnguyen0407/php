<?php
include "./header.php";
require_once "../config.php";
include "./check.php";
$sql = "SELECT * FROM sanpham";
$qr = $link->query($sql);
?>

<div class="content-memo">
    <aside class="container aside">
        <ul class="list-menu">
            <li>
                <a href="./dashboad.php"><i class="ti-stats-up"></i> Dashboard</a>
            </li>
            <li>
                <a href="./addsp.php"><i class="ti-pencil-alt"></i> Thêm sản phẩm </a>
            </li>
            <li class="active">
                <a href="#"><i class="ti-gallery"></i> sản phẩm </a>
            </li>
            <li>
                <a href="#"><i class="ti-user"></i> thành viên </a>
            </li>
        </ul>
    </aside>
    <div class="content-main">
        <div class="table">
            <table class="table-main">
                <thead>
                    <tr class="table100-head">
                        <th class="column1">Ảnh</th>
                        <th class="column3">Tên Sản Phẩm</th>
                        <th class="column4">Giá</th>
                        <th class="column7">
                            Chage
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($rows = $qr->fetch_array()) {
                    ?>
                        <tr>
                            <td class="column1">
                                <img src="../imgUp/<?php echo $rows['srcImg'] ?>" alt="">
                            </td>
                            <td class="column3"><?php echo $rows['tenSanPham'] ?></td>
                            <td class="column4"><?php echo number_format($rows['giaSanPham'], 0, ".", ".") . "đ" ?></td>
                            <td class="column7">
                                <a href="./chagesp.php?id=<?php echo $rows['maSanPham'] ?>">
                                    <i class="ti-pencil-alt chage"></i>
                                </a>
                                <a href="./remove.php?id=<?php echo $rows['maSanPham'] ?>">
                                    <i class="ti-trash remove"></i>
                                </a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


</body>

</html>