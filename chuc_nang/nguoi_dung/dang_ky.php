<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    $tai_khoan = $_POST['tai_khoan'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $ho_ten = $_POST['ho_ten'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $thanh_pho = $_POST['thanh_pho'];

    $check_tai_khoan_query = "SELECT tai_khoan FROM nguoi_dung WHERE tai_khoan='{$tai_khoan}'";
    $check_tai_khoan_result = mysqli_query($conn, $check_tai_khoan_query);

    $check_email_query = "SELECT email FROM nguoi_dung WHERE email='{$email}'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if (empty($tai_khoan) || empty($mat_khau) || empty($email) || empty($so_dien_thoai) || empty($dia_chi) || empty($ho_ten) || empty($thanh_pho)) {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
    else if (mysqli_num_rows($check_tai_khoan_result) > 0) {
        echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email này không hợp lệ. Vui long nhập email khác.";
    }
    else if (mysqli_num_rows($check_email_result) > 0) {
        echo "Email này đã có người dùng. Vui lòng chọn Email khác.";
    }
     else {
        $query = "INSERT INTO nguoi_dung (tai_khoan, mat_khau, email, ho_ten, dia_chi, thanh_pho) VALUES ('$tai_khoan', '$mat_khau', '$email', '$ho_ten', '$dia_chi', '$thanh_pho')";
        mysqli_query($conn, $query);
        header('Location: ../../');
    }
}
?>
<html>
<head>
    <title>Đăng ký</title>
</head>
<style>
    body {
    background-color: #f2f2f2;
    }
    form {
        padding: 10px;
    }
    .container2 {
        width: 500px;
        margin: 0 auto;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    input[type=text], input[type=password], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    button {
        background-color: #00a5e5;
        color:#fff;
        padding: 14px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        background-color: #0077b3;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
<body>
    <form method="POST">
        <div class="container2">
            <h1>Đăng Ký</h1>
            <p>Xin hãy nhập biểu mẫu bên dưới để đăng ký.</p>
            <hr>
            <label for="text"><b>Họ và tên:</b></label>
            <input type="text" placeholder="Nhập họ và tên" name="ho_ten" required>
            <br>
            <label for="text"><b>Tên đăng nhập:</b></label>
            <input type="text" placeholder="Nhập tên đăng nhập" name="tai_khoan" required>
            <br>
            <label for="psw"><b>Mật Khẩu:</b></label>
            <input type="password" placeholder="Nhập Mật Khẩu" name="mat_khau" required>
            <br>
            <label for="email"><b>Email:</b></label>
            <input type="text" placeholder="Nhập Email" name="email" required>
            <br>
            <label for="text"><b>Số điện thoại:</b></label>
            <input type="text" placeholder="Nhập số điện thoại" name="so_dien_thoai" required>
            <br>
            <label for="text"><b>Địa chỉ:</b></label>
            <input type="text" placeholder="Nhập địa chỉ" name="dia_chi" required>
            <br>
            <label for="text"><b>Thành phố:</b></label>
            <input type="text" placeholder="Nhập thành phố" name="thanh_pho" required>
            <br>
            <div class="clearfix">
            <button type="submit" class="signupbtn">Đăng Ký</button>
        </div>
    </form>
</body>

