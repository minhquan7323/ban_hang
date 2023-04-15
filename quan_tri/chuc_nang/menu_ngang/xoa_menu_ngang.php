<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$id=$_GET['id'];
	$tv="DELETE FROM menu_ngang WHERE id = $id ";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	mysqli_query($conn, $tv);
?>