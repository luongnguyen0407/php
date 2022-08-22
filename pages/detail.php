<?php
include "./header.php";
require_once "./config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE maSanPham = $id ";
    $qr = $link->query($sql);
    $row = $qr->fetch_array();
} else {
    header('location: ./index.php');
}
if (isset($_POST['add-cart'])) {
    header('location: ./index.php');
}
?>
<div class="lightbox ">
    <div class="lightbox-content">
        <div class="introl-sp">
            <div class="img">
                <img class="lightbox-image" src="./imgUp/<?php echo $row['srcImg'] ?>" alt="">
            </div>
            <div class="text">
                <p class="brand-name">Apple</p>
                <h3 class="name-sp"><?php echo $row['tenSanPham'] ?></h3>
                <div class="start">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <p>(5 Reviews )</p>
                </div>
                <p class="detail"><?php echo $row['moTa'] ?></p>
                <div class="color">
                    <h4>Color</h4>
                    <div class="choseColor">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="cost">
                    <p><?php echo number_format($row['giaSanPham'], 0, ".", ".") . "đ" ?></p>
                </div>
                <form class="product-detail-actiont" action="./cart.php?action=add" method="POST">
                    <div class="control">
                        <div class="rai">-</div>
                        <input class="sl" name="sp[<?= $row['maSanPham'] ?>]" value="1" type="text">
                        <div class="su">+</div>
                    </div>
                    <button type="submit" class="addCart">
                        <i class="fa-solid fa-cart-arrow-down"></i>
                        <p>Thêm Vào Giỏ</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../js/cart.js"></script>


</div>
<?php
include "./footer.php"
?>