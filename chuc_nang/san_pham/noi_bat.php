<p class="title">Sản phẩm nổi bật</p>
<?php 
	$tv="select id, ten, hinh_anh FROM san_pham WHERE noi_bat='co' ORDER BY id DESC LIMIT 0,3";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	while($tv_2=mysqli_fetch_array($tv_1)) {
		$link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
		$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
		echo "<div class='lazyload_item single_item noi_bat'>
				<a href='".$link_chi_tiet."'><img src='".$link_anh."'></a>
				<h5><a href='".$link_chi_tiet."'>".$tv_2['ten']."</a></h5>
			</div>";
	}
?>
