<?php
require_once "config.php";
$err = [];
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = "Email không đúng hoặc bị trống";
    }
    if (empty($password)) {
        $err['password'] = 'Bạn Phải Nhập Password';
    }
    if (empty($err)) {
        $sql = "SELECT * FROM `khachhang` WHERE email = '$email' ";
        $resu =  $link->query($sql);
        $data = $resu->fetch_assoc();
        $checkEmail = $resu->num_rows;
        if ($checkEmail == 1) {
            $checkPass = password_verify($password, $data['password']);
            if ($checkPass) {
                $_SESSION['user'] = $data;
                $data["chucVu"] == 1 ? header('location: ./admin/dashboad.php') : header('location: ./index.php');
            } else {
                $err['password'] = "Password sai";
            }
        } else {
            $err['email'] = "Email không tồn tại";
        }
        $link->close();
    }
}
?>

<?php
include "./header.php"
?>
<div class="wrap-main">
    <section class="form">
        <form class="form-sign" action="" method="POST" onsubmit="return handleSubmit()">
            <h2>Đăng Nhập</h2>
            <div>
                <label for="">Email</label>
                <input autocomplete="off" type="text" name="email">
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['email']) ? $err['email'] : '')   ?>
                    </span>
                </div>
            </div>
            <div>
                <label for="">Mật Khẩu</label>
                <input autocomplete="off" type="password" name="password">
                <div class="err">
                    <span class="has-err">
                        <?php echo (isset($err['password']) ? $err['password'] : '')   ?>
                    </span>
                </div>
            </div>
            <input type="submit" name="submit" class="btn-submit" value="Đăng Nhập"></input>
        </form>
    </section>
    <?php
    include "./footer.php"
    ?>
</div>
<script src="../js/header.js"></script>
</body>

</html>