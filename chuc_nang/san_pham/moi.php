<p class="title">Sản phẩm mới</p>
<center>
	<?php 
		$conn = new mysqli("localhost", "root", "", "ban_hang");
		if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
		
		$tv = "SELECT id, ten, hinh_anh FROM san_pham ORDER BY id DESC LIMIT 0,3";
		$tv_1 = $conn->query($tv);
		
		while($tv_2 = $tv_1->fetch_assoc()) {
			$link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
			$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
			echo "<div class='lazyload_item single_item moi'>
					<a href='".$link_chi_tiet."'><img src='".$link_anh."'></a>
					<h5><a href='".$link_chi_tiet."'>".$tv_2['ten']."</a></h5>
				</div>";
		}
		$conn->close();
	?>
</center>
