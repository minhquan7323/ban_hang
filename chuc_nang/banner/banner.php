<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$tv = "SELECT * FROM banner LIMIT 0,1";
	$tv_1 = $conn->query($tv);
	$tv_2 = $tv_1->fetch_assoc();
	
	$link_hinh = "hinh_anh/banner/".$tv_2['hinh'];	
	echo "<img"." src='".$link_hinh."' width='".$tv_2['rong']."' height='".$tv_2['cao']."' >";
	$conn->close();
?>