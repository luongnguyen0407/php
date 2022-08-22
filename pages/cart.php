<?php
require_once "./config.php";
include "./header.php";
if (!isset($_SESSION['user'])) {
    header('location: ./login.php');
}
$idUser = $_SESSION['user']['idKH'];
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
if (isset($_GET['action'])) {
    function update_cart($add = false)
    {
        foreach ($_POST['sp'] as $id => $sp) {
            if ($sp == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                if ($add) {
                    $_SESSION['cart'][$id] += $sp;
                } else {
                    $_SESSION['cart'][$id] = $sp;
                }
            }
        }
    };
    switch ($_GET['action']) {
        case 'add':
            update_cart(true);
            header('location: ./cart.php');
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            header('location: ./cart.php');
            break;
        case 'submit':
            if (isset($_POST['update'])) {
                update_cart();
                header('location: ./cart.php');
            }
            if (isset($_POST['order'])) {
                $err = [];
                $ngnhan = $_POST['nguoinhan'];
                $diachi = $_POST['diachi'];
                $sodt = $_POST['sdt'];
                if (empty($ngnhan)) {
                    $err['ngnhan'] = 'Bạn Phải Nhập Tên Người Nhận';
                }
                if (empty($diachi)) {
                    $err['diachi'] = 'Bạn Phải Nhập Địa Chỉ Nhận';
                }
                if (empty($sodt) || !is_numeric($sodt)) {
                    $err['sodt'] = 'Bạn Nhập Sai Số Điện Thoại (number)';
                }
                if (empty($_POST["sp"])) {
                    echo " <script>
            alert('Giỏ Hàng Của Bạn Đang Trống')
        </script>";
                }
                if (empty($err) && !empty($_POST["sp"])) {
                    $today = date("Y-m-d");
                    $hdID = implode(",", array_keys($_POST['sp']));
                    $oderProduct = [];
                    $sql = "SELECT * FROM `sanpham` WHERE `maSanPham` IN ($hdID)";
                    $res = $link->query($sql);
                    $total = 0;
                    while ($row = $res->fetch_array()) {
                        $oderProduct[] = $row;
                        $total += $row['giaSanPham'] * $_POST["sp"][$row['maSanPham']];
                    }
                    $iset = "INSERT INTO `hoadon` (maKhachHang, soDT, diaChi, tongTien, ngayXuat) VALUES ('$idUser', '$sodt', '$diachi', '$total', '$today')";
                    $link->query($iset);
                    $getID = $link->insert_id;
                    $insertStr = "";
                    foreach ($oderProduct as $key => $product) {
                        $insertStr .= "('$getID', '" . $_POST['sp'][$product['maSanPham']] . "', '" . $product['giaSanPham'] . "', '" . $product['maSanPham'] . "')";
                        if ($key != count($oderProduct) - 1) {
                            $insertStr .= ",";
                        }
                    }
                    $insetDetail =  "INSERT INTO `chitiethoadon` (`maHoaDon`, `soLuong`, `giaBan`, `maSP`) VALUES " . $insertStr . "";
                    $link->query($insetDetail);
                    echo " <script>
                    alert('Đặt Hàng Thành Công')
                </script>";
                    unset($_SESSION['cart']);
                }
            }
            break;
        default:
            # code...
            break;
    }
}
if (!empty($_SESSION['cart'])) {
    $spID = implode(",", array_keys($_SESSION['cart']));
    $sql = "SELECT * FROM `sanpham` WHERE `maSanPham` IN ($spID)";
    $kq = $link->query($sql);
}

?>
<div class="wrapper-cart">
    <div class="table container">
        <form action="cart.php?action=submit" method="POST">
            <table class="table-main">
                <thead>
                    <tr class="table100-head">
                        <th class="column1">Ảnh</th>
                        <th class="column3">Tên Sản Phẩm</th>
                        <th class="column4">Số Lượng</th>
                        <th class="column4">Đơn Giá</th>
                        <th class="column4">Thành Tiền</th>
                        <th class="column7">
                            Chage
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($kq)) {
                        $total = 0;
                        while ($row = $kq->fetch_array()) {
                    ?>
                            <tr>
                                <td class="column1">
                                    <img src="./imgUp/<?= $row['srcImg'] ?>" alt="">
                                </td>
                                <td class="column3"><?= $row['tenSanPham'] ?></td>
                                <td class="column4 column_input">
                                    <div class="rai">-</div>
                                    <input class="sl" type="text" name="sp[<?= $row['maSanPham'] ?>]" value="<?= $_SESSION['cart'][$row['maSanPham']] ?>">
                                    <div class="su">+</div>
                                </td>
                                <td class="column4"><?= number_format($row['giaSanPham'], 0, ".", ".") . 'đ' ?></td>
                                <td class="column4"><?= number_format($row['giaSanPham'] * $_SESSION['cart'][$row['maSanPham']], 0, ".", ".") . 'đ' ?></td>
                                <td class="column7">
                                    <a href="./cart.php?action=delete&id=<?= $row['maSanPham'] ?>">
                                        <i class="ti-trash remove"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $total += $row['giaSanPham'] * $_SESSION['cart'][$row['maSanPham']];
                        }
                        ?>
                        <tr>
                            <td class="column1">Tổng Tiền
                            </td>
                            <td class="column3">&nbsp</td>
                            <td class="column4">
                                &nbsp
                            </td>
                            <td class="column4">&nbsp</td>
                            <td class="column4">&nbsp</td>
                            <td class="column7">
                                <?= number_format($total, 0, ".", ".") . 'đ' ?>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <div class="wrap-submit-input">
                <input type="submit" name="update" value="Update">
            </div>
            <div class="form-location">
                <div class="text-field">
                    <label for="username3">Người nhận</label>
                    <input name="nguoinhan" autocomplete="off" type="text" id="username3" placeholder="Nhập tên người nhận" />
                    <div class="err">
                        <span class="has-err">
                            <?php echo (isset($err['ngnhan']) ? $err['ngnhan'] : '')   ?>
                        </span>
                    </div>
                </div>
                <div class="text-field">
                    <label for="">Địa chỉ</label>
                    <textarea placeholder="Nhập địa chỉ nhận hàng ..." name="diachi" id=""></textarea>
                    <div class="err">
                        <span class="has-err">
                            <?php echo (isset($err['daichi']) ? $err['diachi'] : '')   ?>
                        </span>
                    </div>
                </div>
                <div class="text-field">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="sdt" id="" placeholder="Nhập số điện thoại">
                    <div class="err">
                        <span class="has-err">
                            <?php echo (isset($err['sodt']) ? $err['sodt'] : '')   ?>
                        </span>
                    </div>
                </div>
            </div>

            <input class="oder-btn" type="submit" name="order" value="Đặt Hàng">
        </form>
    </div>
</div>
<script src="../js/cart.js"></script>
<?php
include "./footer.php"
?>