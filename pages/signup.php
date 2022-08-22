<?php
require_once "config.php";
$err = [];
if (isset($_POST['userName'])) {
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['rPassword'];
    if (empty($userName)) {
        $err['userName'] = 'Bạn Phải Nhập Họ Và Tên';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = "Email không đúng hoặc bị trống";
    }
    if (empty($password)) {
        $err['password'] = 'Bạn Phải Nhập Password';
    }
    if (!empty($password) && $password != $rPassword) {
        $err['rPassword'] = 'Password nhập lại không đúng';
    }
    if (empty($err)) {
        $newPass = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `khachhang`(email, passWord, userName) VALUES ('$email' , '$newPass','$userName')";
        try {
            $link->query($sql);
            header('location: ./login.php');
        } catch (Exception $e) {
            echo " <script>
            alert('Email Đã Tồn Tại')
        </script>";
        }
        $link->close();
    }
}
?>


<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../style/new.css">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">

    <title>ĐĂNG KÝ</title>
    <style>
        .has-err {
            color: red;
        }
    </style>
</head>

<body>
    <div class="wrap-main">
        <?php
        include "./header.php"
        ?>
        <section class="form">
            <form class="form-sign" action="" method="POST" onsubmit="return handleSubmit()">
                <h2>Đăng Ký</h2>
                <div>
                    <label for="">Họ tên</label>
                    <input autocomplete="off" type="text" name="userName">
                    <div class="err">
                        <span class="has-err">
                            <?php echo (isset($err['userName']) ? $err['userName'] : '')   ?>
                        </span>
                    </div>
                </div>
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
                        <div class="has-err">
                            <?php echo (isset($err['password']) ? $err['password'] : '')   ?>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="">Nhập Lại Mật Khẩu</label>
                    <input autocomplete="off" type="password" name="rPassword">
                    <div class="err">
                        <span class="has-err">
                            <?php echo (isset($err['rPassword']) ? $err['rPassword'] : '')   ?>
                        </span>
                    </div>
                </div>
                <p>Bạn đã có tài khoản ? <a href="./login.php">Đăng Nhập</a></p>
                <input type="submit" name="submit" class="btn-submit" value="Đăng Ký"></input>
            </form>
        </section>
        <?php
        include "./footer.php"
        ?>

    </div>
    <script src="../js/header.js"></script>
</body>

</html>