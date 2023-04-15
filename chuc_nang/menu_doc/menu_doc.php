<?php 
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$tv = "SELECT * FROM menu_doc ORDER BY id";
	$tv_1 = $conn->query($tv);
	echo "<div class='menu_doc'>";
	while ($tv_2 = $tv_1->fetch_assoc()) {
		$link = "?thamso=xuat_san_pham&id=" . $tv_2['id'];
		echo "<a href='$link'>" . $tv_2['ten'] . "</a>";
	}
	echo "</div>";
	$conn->close();
?>
