<?php if(!isset($bien_bao_mat)){exit();} ?>
<?php 
	$nguoi_dung_id=$_GET['nguoi_dung_id'];
	$tv="select * from nguoi_dung where nguoi_dung_id='$nguoi_dung_id' ";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$ho_ten=$tv_2['ho_ten'];
	$tai_khoan=$tv_2['tai_khoan'];
	$mat_khau=$tv_2['mat_khau'];
	$email=$tv_2['email'];
	$so_dien_thoai=$tv_2['so_dien_thoai'];
	$dia_chi=$tv_2['dia_chi'];
	$tinh_thanh=$tv_2['tinh_thanh'];
	$quan_huyen=$tv_2['quan_huyen'];
?>
<div class="content">
    <div class="row">
        <div class="title col-12 box_shadow">
            <b>Sửa người dùng</b>
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
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Email này không hợp lệ. Vui long nhập email khác.";
            }
            else if (!filter_var($so_dien_thoai, FILTER_VALIDATE_INT)) {
                echo "Số điện thoại này không hợp lệ. Vui long nhập số điện thoại khác.";
                exit;
            }
            // else {
            //     $query = "INSERT INTO nguoi_dung (tai_khoan, mat_khau, email, ho_ten, dia_chi, tinh_thanh, quan_huyen) VALUES ('$tai_khoan', '$mat_khau', '$email', '$ho_ten', '$dia_chi', '$tinh_thanh', '$quan_huyen')";
            //     mysqli_query($conn, $query);
            //     header('Location: ../quan_tri/?thamso=nguoi_dung');
            //     exit;
            // }
        }
        ?>  
        <div class="table-responsive-lg">
        <table class="table table-bordered">
            <form action="" method="post" class="width_form">
                <div class="row g-3 w">
                    <div class="col-12 form-floating">
                        <input type="text" value="<?php echo $ho_ten; ?>" name="ho_ten" class="form-control" placeholder="Họ và tên" required>
                        <label for="floatingInput">Họ và tên</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="text" value="<?php echo $tai_khoan; ?>" name="tai_khoan" class="form-control" placeholder="Tên đăng nhập" required readonly>
                        <label for="floatingInput">Tài khoản</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="text" value="<?php echo $mat_khau; ?>" name="mat_khau" class="form-control" placeholder="Mật khẩu" required>
                        <label for="floatingInput">Mật khẩu</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="email" value="<?php echo $email; ?>" name="email" class="form-control" placeholder="Email" required readonly>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="col-6 form-floating">
                        <input type="text" value="<?php echo $so_dien_thoai; ?>" name="so_dien_thoai" class="form-control" placeholder="Số điện thoại" required>
                        <label for="floatingInput">Số điện thoại</label>
                    </div>
                    <div class="col-12 form-floating">
                        <input type="text" value="<?php echo $dia_chi; ?>" name="dia_chi" class="form-control" placeholder="Địa chỉ" required>
                        <label for="floatingInput">Địa chỉ</label>
                    </div>
                    <div class="col-6">
                        <select name="tinh_thanh" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm" required>
                            <option  value="<?php echo $tinh_thanh; ?>" selected>Chọn tỉnh thành</option>           
                        </select>
                    </div>
                    <div class="col-6">
                        <select name="quan_huyen" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm" required>
                            <option  value="<?php echo $quan_huyen; ?>" selected>Chọn quận huyện</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="submit" name="bieu_mau_sua_nguoi_dung" class="btn btn-outline-success" onclick="return confirm('Bạn có chắc chắn muốn sửa người dùng này?')">Sửa người dùng</button>
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