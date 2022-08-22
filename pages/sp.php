<?php
include "./header.php";

$search = isset($_GET['query']) ? $_GET['query'] : "";

$get_sl_item = !empty($_GET['sl']) ? $_GET['sl'] : 8;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $get_sl_item;
if ($search) {
    $sql_count = "SELECT *  FROM sanpham WHERE `tenSanPham` LIKE '%$search%'";
    $sql = "SELECT * FROM sanpham WHERE `tenSanPham` LIKE '%$search%' ORDER BY 'maSanPham' ASC LIMIT " . $get_sl_item . " OFFSET " . $offset . "";
} else {
    $sql_count = "SELECT *  FROM sanpham";
    $sql = "SELECT * FROM sanpham ORDER BY 'maSanPham' ASC LIMIT " . $get_sl_item . " OFFSET " . $offset . "";
}

$item_record = $link->query($sql_count);
$item_record = $item_record->num_rows;
$total_page = ceil($item_record / $get_sl_item);
$dt = $link->query($sql);
$link->close();
?>
<div class="wrapper-sp">
    <section class="sp-banner">
        <img src="../img/banner.png" alt="">
    </section>
    <div class="content-product">
        <div class="container">
            <form class="search-sp" method="GET">
                <input placeholder="Nhập sản phẩm cần tìm ..." class="search-sp" type="text" name="query" value="<?= $search ?>">
                <input class="btn-more" type="submit" value="Tìm Kiếm">
            </form>
            <h3 class="headding-product">Sản Phẩm Nổi Bật</h3>
            <div class="wrap-item-dt">
                <?php
                if ($dt->num_rows == 0) {
                ?>
                    <h3 class="empty_query">Không Có Sản Phẩm Nào</h3>
                    <?php
                } else {
                    while ($rows = $dt->fetch_array()) {
                    ?>
                        <div class="sp-one">
                            <a href="./detail.php?id=<?php echo $rows['maSanPham'] ?>">
                                <div class="tragop">
                                    <span class="lb-tragop">Trả góp 0%</span>
                                </div>
                                <div class="item-img">
                                    <img class="item-img-product" alt="Samsung Galaxy M53" src="./imgUp/<?php echo $rows['srcImg'] ?>">
                                    <img class="doqu" src="../img/Label_01-05.png">
                                </div>
                                <div>
                                    <p class="temp3">
                                        <img src="https://cdn.tgdd.vn/2022/07/content/50x50-50x50-12.png">
                                        <span>ƯU ĐÃI SINH NHẬT</span>
                                    </p>
                                    <h3><?php echo $rows['tenSanPham'] ?></h3>
                                    <strong class="price"><?php echo number_format($rows['giaSanPham'], 0, ".", ".") . "đ" ?></strong>
                                    <p class="vote-txt">
                                    <div class="wrap-icon">
                                        <b>4.1</b>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                    </p>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="wrap-navigate">
                <?php
                $get_query = "";
                if ($search) {
                    $get_query = "query=" . $search . "&";
                }
                if ($current_page > 3) {
                    $first_page = 1;
                ?>
                    <a href="?<?= $get_query ?>sl=<?= $get_sl_item ?>&page=<?= $first_page ?>">First</a>
                    <?php
                }
                for ($num = 1; $num <= $total_page; $num++) {
                    if ($num != $current_page) {
                        if ($num > $current_page - 3 && $num < $current_page + 3) {
                    ?>
                            <a href="?<?= $get_query ?>sl=<?= $get_sl_item ?>&page=<?= $num ?>"><?= $num ?></a>
                        <?php
                        }
                    } else {
                        ?>
                        <a class="ok"><?= $num ?></a>
                    <?php
                    }
                }
                if ($current_page < $total_page - 3) {
                    $end_page = $total_page;
                    ?>
                    <a href="?<?= $get_query ?>sl=<?= $get_sl_item ?>&page=<?= $end_page ?>">End</a>
                <?php
                }
                ?>

            </div>
        </div>

    </div>

</div>
<script>
    window.addEventListener('load', () => {
        const scrollTo = document.querySelector('.content-product');
        let elmPosition = scrollTo.getBoundingClientRect();
        window.scrollTo({
            top: elmPosition.top,
            behavior: 'smooth'
        });
    })
</script>
<?php
include "./footer.php"
?>