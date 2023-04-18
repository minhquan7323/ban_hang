<?php if(!isset($bien_bao_mat)){exit();} ?>
<div class="content">
    <div class="row">
        <div class="title col-12 box_shadow">
            <b>Thêm người dùng</b>
        </div>
    </div>
    <div class="row main_frame box_card box_shadow">
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

            if (mysqli_num_rows($check_tai_khoan_result) > 0) {
                echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác.";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email này không hợp lệ. Vui long nhập email khác.";
            }
            else if (mysqli_num_rows($check_email_result) > 0) {
                echo "Email này đã có người dùng. Vui lòng chọn Email khác.";
            }
            else if (!filter_var($so_dien_thoai, FILTER_VALIDATE_INT)) {
                echo "Số điện thoại này không hợp lệ. Vui long nhập số điện thoại khác.";
            }
            else {
                $query = "INSERT INTO nguoi_dung (tai_khoan, mat_khau, email, so_dien_thoai, ho_ten, dia_chi, tinh_thanh, quan_huyen) VALUES ('$tai_khoan', '$mat_khau', '$email', '$so_dien_thoai', '$ho_ten', '$dia_chi', '$tinh_thanh', '$quan_huyen')";
                mysqli_query($conn, $query);
                header('Location: ../quan_tri/?thamso=nguoi_dung');
                exit;
            }
        }
        ?>  
        <div class="table-responsive-lg">
        <table class="table table-bordered">
            <form action="" method="post" class="width_form">
            <div class="row g-3 w">
                    <div class="col-12 form-floating">
                        <input type="text" name="ho_ten" class="form-control" placeholder="Họ và tên" required>
                        <label for="floatingInput">Họ và tên</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="text" name="tai_khoan" class="form-control" placeholder="Tên đăng nhập" required>
                        <label for="floatingInput">Tài khoản</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="text" name="mat_khau" class="form-control" placeholder="Mật khẩu" required>
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="text" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại" required>
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" name="dia_chi" class="form-control" placeholder="Địa chỉ" required>
                        <label for="floatingInput">Địa chỉ</label>
                    </div>
                    <div class="col-6">
                        <select name="tinh_thanh" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" required>
                            <option  value="" selected>Chọn tỉnh thành</option>           
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="quan_huyen" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm" required>
                            <option  value="" selected>Chọn quận huyện</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-success" onclick="return confirm('Bạn có chắc chắn muốn thêm người dùng này?')">Thêm người dùng</button>
            </form>
        </table>
        </div>
    </div>
</div>

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