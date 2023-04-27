<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "ban_hang");

    $tai_khoan = $_POST['tai_khoan'];
    $mat_khau = $_POST['mat_khau'];
    $email = $_POST['email'];
    $ho_ten = $_POST['ho_ten'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];
    $tinh_thanh = $_POST['tinh_thanh'];
    $quan_huyen = $_POST['quan_huyen'];

    $check_tai_khoan_query = "SELECT tai_khoan FROM nguoi_dung WHERE tai_khoan='{$tai_khoan}'";
    $check_tai_khoan_result = mysqli_query($conn, $check_tai_khoan_query);

    $check_email_query = "SELECT email FROM nguoi_dung WHERE email='{$email}'";
    $check_email_result = mysqli_query($conn, $check_email_query);
    $phone_number_regex = '/^(03|05|07|08|09|01[2|6|8|9])[0-9]{8}$/';
    if (!preg_match($phone_number_regex, $so_dien_thoai)) {
        echo "Số điện thoại này không hợp lệ. Vui lòng nhập số điện thoại khác.";
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
        $query = "INSERT INTO nguoi_dung (tai_khoan, mat_khau, email, ho_ten, dia_chi, tinh_thanh, quan_huyen) VALUES ('$tai_khoan', '$mat_khau', '$email', '$ho_ten', '$dia_chi', '$tinh_thanh', '$quan_huyen')";
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

            <select name="tinh_thanh" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" required>
                <option value="" selected>Chọn tỉnh thành</option>           
            </select>
            <select name="quan_huyen" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm" required>
                <option value="" selected>Chọn quận huyện</option>
            </select>
            <div class="clearfix">
            <button type="submit" class="signupbtn">Đăng Ký</button>
        </div>
    </form> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
            method: "GET", 
            responseType: "application/json", 
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data)
                citis.options[citis.options.length] = new Option(x.Name, x.Name);
            citis.onchange = function () {
                district.length = 1;
                if(this.value != "") {
                    const result = data.filter(n => n.Name === this.value);
                    for (const k of result[0].Districts)
                        districts.options[districts.options.length] = new Option(k.Name, k.Name);
                }
            };
        }
    </script>

</body>

