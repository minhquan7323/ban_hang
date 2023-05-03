<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");
    $tv="SELECT * FROM nguoi_dung WHERE nguoi_dung_id =".$_SESSION['uid'];
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
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="./giao_dien/giao_dien.css">
		<link rel="stylesheet" href="./phan_bo_tro/fontawesome-free-6.2.0-web/css/all.css">
		<link rel="stylesheet" href="./phan_bo_tro/font_Roboto/Roboto-Bold.ttf">
		<link rel="stylesheet" href="./phan_bo_tro/bootstrap-5.2.2-dist/css/bootstrap.min.css">
		<script src="./phan_bo_tro/bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
	</head>	
	<body>
        <div>
            <h3 class="title">Thông tin mua hàng</h3>
            <div class="container">
                <form method="post" action="">
                    <input type='hidden' name='thong_tin_khach_hang' value='co' >
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12 dia_chi_nhan_hang">
                                <h4><i class="fa-solid fa-location-dot"></i> Địa chỉ nhận hàng</h4>
                                <span id="dia_chi_nhan_hang_moi">
                                    <div class="dia_chi_nhan_hang_moi" style="display:none;">
                                        <div class="row">
                                            <h4>Nhập địa chỉ mới</h4>
                                            <div class="col-6 form-floating mb-3">
                                                <input type="text" class="form-control" name="ho_ten_moi" placeholder="Tên người nhận" disabled>
                                                <label for="floatingInput">Tên người nhận</label>
                                            </div>
                                            <div class="col-6 form-floating mb-3">
                                                <input type="text" class="form-control" name="so_dien_thoai_moi" placeholder="Số điện thoại" disabled>
                                                <label for="floatingInput">Số điện thoại</label>
                                            </div>
                                            <div class="col-4 form-floating mb-3">
                                                <input type="text" class="form-control" name="dia_chi_moi" placeholder="Địa chỉ" disabled>
                                                <label for="floatingInput">Địa chỉ</label>
                                            </div>
                                            <div class="col-4 form-floating mb-3">
                                                <select name="tinh_thanh_moi" class="form-select form-select-sm mb-3" id="city" aria-label=".form-select-sm">
                                                    <option value="" selected>Chọn tỉnh thành</option>           
                                                </select>
                                                <label for="floatingInput">Tỉnh thành</label>
                                            </div>
                                            <div class="col-4 form-floating mb-3">
                                                <select name="quan_huyen_moi" class="form-select form-select-sm mb-3" id="district" aria-label=".form-select-sm">
                                                    <option value="" selected>Chọn quận huyện</option>
                                                </select>
                                                <label for="floatingInput">Quận huyện</label>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="btn_cancel" onclick="huy_thay_doi_dia_chi_nhan_hang()">Hủy thay đổi</button>
                                    </div>
                                    <span class="dia_chi_nhan_hang_cu">
                                        <?php echo "<b>".$ho_ten." - ".$so_dien_thoai."</b> "." - ".$dia_chi.", ".$quan_huyen.", ".$tinh_thanh;?>      
                                        <button type="button" class="btn btn-secondary" id="btn_change" onclick="dia_chi_nhan_hang_moi()">Thay đổi</button>
                                    </span>
                                </span>
                            </div>
                            <div class="col-12 san_pham_mua">
                                <table>
                                    <tr>
                                        <th width="400px">Tên</th>
                                        <th width="100px">Số lượng</th>
                                        <th width="100px">Đơn giá</th>
                                        <th width="100px">Thành tiền</th>
                                    </tr>
                                    <?php
                                    $tong_cong=0;
                                    for($i=0;$i<count($_SESSION['id_them_vao_gio']);$i++) {
                                        $tv="select id,ten,gia from san_pham where id='".$_SESSION['id_them_vao_gio'][$i]."'";
                                        $conn = new mysqli("localhost", "root", "", "ban_hang");
                                        $tv_1 = mysqli_query($conn, $tv);
                                        $tv_2 = mysqli_fetch_array($tv_1);
                                        
                                        if($_SESSION['sl_them_vao_gio'][$i]==0) $tien=0;
                                        else $tien=$tv_2['gia']*$_SESSION['sl_them_vao_gio'][$i];
                                        $tong_cong=$tong_cong+$tien;
                                        $name_id="id_".$i;
                                        $name_sl="sl_".$i;
                                        if($_SESSION['sl_them_vao_gio'][$i]!=0) {
                                        echo "<tr>";
                                            echo "<td>".$tv_2['ten']."</td>";
                                            echo "<td>".$_SESSION['sl_them_vao_gio'][$i]."</td>";
                                            echo "<td>".number_format($tv_2['gia'],0,",",".")."<u>đ</u></td>";
                                            echo "<td>".number_format($tien,0,",",".")."<u>đ</u></td>";
                                        echo "</tr>";
                                        }
                                    }	
                                    ?>
                                    <tr class="tong_cong">
                                        <th width="400px">Tổng cộng:</th>
                                        <th width="100px"></th>
                                        <th width="100px"></th>
                                        <th width="100px"><?php echo number_format($tong_cong,0,",","."); ?><u>đ</u></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-12 phuong_thuc_thanh_toan">
                                <div class="row">
                                    <div class="col-4">
                                        <h5>Phương thức thanh toán</h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked onchange="thanh_toan_online()">
                                            <label class="form-check-label" for="inlineRadio1">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" onchange="thanh_toan_online()">
                                            <label class="form-check-label" for="inlineRadio2">Thanh toán Online</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="phuong_thuc_thanh_toan" id="phuong_thuc_thanh_toan" value="COD">
                                <div id="thanh_toan_online">

                                </div>
                            </div>
                            <div class="ghi_chu form-floating mb-3">
                                <textarea id="noi_dung" name="ghi_chu" class="form-control" placeholder="Ghi chú" id="floatingTextarea" style="height: 100px"></textarea>
								<label for="floatingTextarea">Ghi chú</label>
                            </div>
                        </div>
                    </div>
                    <button type="button submit" class="btn btn-success">Đặt hàng</button>
                </form>
            </div>
        </div>
	</body>
    <script>
        function thanh_toan_online() {
            var radio = document.getElementsByName("inlineRadioOptions");
            var thanh_toan_online = document.getElementById("thanh_toan_online");
            if (radio[0].checked) {
                thanh_toan_online.style.display = "none";
            } else {
                var a = `
                        <div class="row">
                            <div class="col-6 form-floating mb-3">
                                <input type="text" class="form-control" value="VCB" placeholder="Ngân hàng" required readonly>
                                <label for="floatingInput">Tên thẻ</label>
                            </div>
                            <div class="col-6 form-floating mb-3">
                                <input type="text" class="form-control" value="0123456789" placeholder="Số thẻ" required readonly>
                                <label for="floatingInput">Số thẻ</label>
                            </div>
                            <div class="col-12 form-floating mb-3">
                                <input type="text" class="form-control" value="nội thất deKor" placeholder="Tên người nhận" required readonly>
                                <label for="floatingInput">Tên người nhận</label>
                            </div>
                        </div>
                `;
                thanh_toan_online.innerHTML = a;
                thanh_toan_online.style.display = "block";
                document.getElementById("phuong_thuc_thanh_toan").value = "Online";
            }
        }
        function dia_chi_nhan_hang_moi() {
        var diaChiNhanHangMoi = document.getElementsByClassName("dia_chi_nhan_hang_moi")[0];
        var diaChiNhanHangCu = document.getElementsByClassName("dia_chi_nhan_hang_cu")[0];
        diaChiNhanHangMoi.style.display = "block";
        diaChiNhanHangCu.style.display = "none";
        var inputs = diaChiNhanHangMoi.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].setAttribute('required', true);
            inputs[i].removeAttribute('disabled');
        }
    }
    function huy_thay_doi_dia_chi_nhan_hang() {
        var diaChiNhanHangMoi = document.getElementsByClassName("dia_chi_nhan_hang_moi")[0];
        var diaChiNhanHangCu = document.getElementsByClassName("dia_chi_nhan_hang_cu")[0];
        diaChiNhanHangMoi.style.display = "none";
        diaChiNhanHangCu.style.display = "block";
        var inputs = diaChiNhanHangMoi.getElementsByTagName('input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].removeAttribute('required');
            inputs[i].setAttribute('disabled', true);
        }
    }

    </script>
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
</html>