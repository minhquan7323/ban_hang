<?php 
	$id=$_GET['id'];
	$tv="select * from menu_ngang where id='$id'";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
  $tv_1 = mysqli_query($conn, $tv);
  $tv_2 = mysqli_fetch_array($tv_1);
	echo "<h1>";
		echo $tv_2['ten'];
	echo "</h1>";
	echo $tv_2['noi_dung'];
?>