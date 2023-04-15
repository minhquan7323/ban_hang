<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$lien_ket=trim($_POST['lien_ket']);
	$ten_file_anh=$_FILES['hinh_anh']['name'];

	if($ten_file_anh!="")
	{
		$tv_k="select count(*) from slideshow where hinh='$ten_file_anh' ";
		$conn = new mysqli("localhost", "root", "", "ban_hang");
		$tv_k_1=mysqli_query($conn, $tv_k);
		$tv_k_2=mysqli_fetch_array($tv_k_1);
		if($tv_k_2[0]==0)
		{
			$tv="
			INSERT INTO slideshow (
			id ,
			hinh,
			lien_ket
			)
			VALUES (
			NULL ,
			'$ten_file_anh',
			'$lien_ket'
			);";
			mysqli_query($conn, $tv);

			$duong_dan_anh="../hinh_anh/slideshow/".$ten_file_anh;
			move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_anh);
		}
		else 
		{
			thong_bao_html("Hình ảnh bị trùng tên");
		}
	}
	else 
	{
		thong_bao_html("Chưa chọn ảnh");
	}

?>