<?php if(!isset($bien_bao_mat)){exit();} ?>
<?php 
	$user_id = $_GET['id'];
	$xoa_nguoi_dung="DELETE FROM nguoi_dung WHERE id = $user_id";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	mysqli_query($conn, $xoa_nguoi_dung);
    if(mysqli_affected_rows($conn) > 0) {
        echo "Người dùng đã được xóa thành công!";
      } else {
        echo "Không thể xóa người dùng!";
      }
      mysqli_close($conn);
?>