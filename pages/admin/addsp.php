<?php
include "./header.php";
require_once "../config.php";
include "./check.php";

$err = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $size = 10;
    $file = $_FILES['fileImg'];
    $tenSP = $_POST['tenSp'];
    $danhMuc = $_POST['danhMuc'];
    $mieuTa = $_POST['mieuTa'];
    $giaSP = $_POST['giaSp'];
    //đổi tên file ảnh
    $fileName = $file['name'];
    $fileName = explode('.', $fileName);
    $ext = end($fileName);
    $newName = md5(uniqid()) . '.' . $ext;
    // Kiểm tra định dạng ảnh;
    $alow_ext = ['jpg', "jpeg", 'gif', 'png', "svg", 'tiff', "bmp", 'tga', "raw", "jfif"];
    if (in_array($ext, $alow_ext)) {
        //thỏa mãn định dạng
        $sizeFile = $file['size'] / 1024 / 1024;
        if ($sizeFile > $size) {
            $err['img'] = "Ảnh có dung lương quá lớn";
        }
    } else {
        //file k đúng định dạng
        $err['img'] = "Ảnh không đúng định dạng";
    }
    if (empty($tenSP)) {
        $err['tensp'] = 'Bạn Phải Nhập Tên Sản Phẩm';
    }
    if (empty($danhMuc)) {
        $err['danhmuc'] = 'Bạn Phải Chọn Danh Mục';
    }
    if (empty($mieuTa)) {
        $err['mieuta'] = 'Bạn Phải Nhập Miêu Tả';
    }
    if (empty($giaSP) || !is_numeric($giaSP)) {
        $err['giasp'] = 'Bạn Phải Nhập Giá Và Phải Là Số';
    }
    if (empty($err)) {
        $sql = "INSERT INTO `sanpham`(tenSanPham, maDanhMuc, moTa, giaSanPham, srcImg) VALUES ('$tenSP' , '$danhMuc','$mieuTa', '$giaSP', '$newName')";
        try {
            $upload = move_uploaded_file($file['tmp_name'], '../imgUp/' . $newName);
            $link->query($sql);
            echo " <script>
            alert('Thêm sản Phẩm Thành Công')
        </script>";
        } catch (Exception $e) {
            echo $e;
            echo " <script>
            alert('Lỗi')
        </script>";
        }
        $link->close();
    }
}
?>

<div class="content-memo">
    <aside class="container aside">
        <ul class="list-menu">
            <li>
                <a href="./dashboad.php"><i class="ti-stats-up"></i> Dashboard</a>
            </li>
            <li class="active">
                <a href="./listsp.php"><i class="ti-pencil-alt"></i> Thêm sản phẩm </a>
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
        <form method="POST" action="" enctype="multipart/form-data" class="form_add_item">
            <h3>Thêm Sản Phẩm Mới</h3>
            <div class="onetr">
                <label for="tenSP">Tên Sản Phẩm</label>
                <input type="text" name="tenSp">
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['tensp']) ? $err['tensp'] : '')   ?>
                    </span>
                </div>
            </div>
            <div class="sele">
                <label for="">Danh Mục</label>
                <select name="danhMuc">
                    <option value="DT">Điện Thoại</option>
                    <option value="LT">Laptop</option>
                </select>
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['danhmuc']) ? $err['danhmuc'] : '')   ?>
                    </span>
                </div>
            </div>
            <div class="onetr">
                <label for="tenSP">Giá Sản Phẩm</label>
                <input type="text" name="giaSp">
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['giasp']) ? $err['giasp'] : '')   ?>
                    </span>
                </div>
            </div>
            <div class="onetr">
                <label for="mieuTa">Miêu Tả</label>
                <textarea type="text" name="mieuTa" class="mieuTa"></textarea>
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['mieuta']) ? $err['mieuta'] : '')   ?>
                    </span>
                </div>
            </div>
            <div class="input-file">
                <label for="">Ảnh Sản Phẩm</label>
                <input type="file" name="fileImg" id="file" class="inputFile" />
                <label for="file" class="input-label">
                    <i class="fas fa-cloud-upload-alt icon-upload"></i>
                </label>
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['img']) ? $err['img'] : '')   ?>
                    </span>
                </div>
            </div>
            <img class="img-pview" src="#" alt="">
            <input type="submit" name="submit" class="btn-add">
        </form>
    </div>
</div>
</div>
<script>
    const inputFile = document.querySelector('.inputFile');
    const imgPew = document.querySelector('.img-pview');
    inputFile.addEventListener("change", (e) => {
        const [file] = e.target.files
        if (file) {
            src = URL.createObjectURL(file)
            imgPew.setAttribute('src', src)
        }
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

</body>

</html>