<?php 
	if(!isset($bien_bao_mat)){exit();}
	$noi_dung=$_POST['noi_dung'];
	$noi_dung=str_replace("'","&#39;",$noi_dung);

	$tv="
	UPDATE footer SET 
	html = '$noi_dung'
	WHERE id=1;
	";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	mysqli_query($conn, $tv);
?>