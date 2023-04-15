<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$ten_menu=trim($_POST['ten']);
	$ten_menu=str_replace("'","&#39;",$ten_menu);
	if($ten_menu!="")
	{
		$tv="
		INSERT INTO menu_doc (
		id ,
		ten 
		)
		VALUES (
		NULL ,
		'$ten_menu'
		);";
		$conn = new mysqli("localhost", "root", "", "ban_hang");
		mysqli_query($conn, $tv);
	}
	else 
	{
		thong_bao_html("Tên menu chưa được điền vào");
	}
?>