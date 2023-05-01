<?php  if(!isset($bien_bao_mat)){exit();} ?>
<?php 
	$ho_ten=trim($_POST['ho_ten']);
	$ho_ten=str_replace("'","&#39;",$ho_ten);
    $tai_khoan=trim($_POST['tai_khoan']);
	$tai_khoan=str_replace("'","&#39;",$tai_khoan);
    $mat_khau=trim($_POST['mat_khau']);
	$mat_khau=str_replace("'","&#39;",$mat_khau);
	$email=$_POST['email'];
	$so_dien_thoai=$_POST['so_dien_thoai'];
	$dia_chi=$_POST['dia_chi'];
	$dia_chi=str_replace("'","&#39;",$dia_chi);
    $tinh_thanh=$_POST['tinh_thanh'];
    $quan_huyen=$_POST['quan_huyen'];
	$nguoi_dung_id=$_GET['nguoi_dung_id'];
    $conn = new mysqli("localhost", "root", "", "ban_hang");
    $tv_k="select * from nguoi_dung";
    $tv_k_1=mysqli_query($conn, $tv_k);
    $tv_k_2=mysqli_fetch_array($tv_k_1);
    $phone_number_regex = '/^0\d{9}$/';
    if (!preg_match($phone_number_regex, $so_dien_thoai)) {
        echo "<script>alert('Số điện thoại này không hợp lệ. Vui lòng nhập số điện thoại khác.');</script>";
    }
    else {
        $tv_k="
        UPDATE nguoi_dung SET 
        ho_ten = '$ho_ten',
        tai_khoan = '$tai_khoan',
        email = '$email',
        mat_khau = '$mat_khau',
        dia_chi = '$dia_chi',
        so_dien_thoai = '$so_dien_thoai',
        tinh_thanh = '$tinh_thanh',
        quan_huyen = '$quan_huyen' 
        WHERE nguoi_dung_id ='$nguoi_dung_id';
        ";
        mysqli_query($conn, $tv_k);
        if (mysqli_query($conn, $tv_k)) {
            header('Location: ./index.php?thamso=nguoi_dung&success=1');
            exit();
        }
    }
?>