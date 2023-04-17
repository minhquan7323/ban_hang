<html>
	<head>
		<link rel="stylesheet" type="text/css" href="./giao_dien/giao_dien.css">
		<link rel="stylesheet" href="./phan_bo_tro/fontawesome-free-6.2.0-web/css/all.css">
		<link rel="stylesheet" href="./phan_bo_tro/font_Roboto/Roboto-Bold.ttf">
		<link rel="stylesheet" href="./phan_bo_tro/bootstrap-5.2.2-dist/css/bootstrap.min.css">
		<script src="./phan_bo_tro/bootstrap-5.2.2-dist/js/bootstrap.bundle.js"></script>
	</head>
	<body>
		<h3 class="title">Sản phẩm của chúng tôi</h3>
		<?php 
			$conn = new mysqli("localhost", "root", "", "ban_hang");
			if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
			$sql = "SELECT id,ten,gia,hinh_anh,thuoc_menu FROM san_pham WHERE trang_chu='co' ORDER BY sap_xep_trang_chu DESC LIMIT 0,15";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			echo "<table>";
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
				for($i=1;$i<=3;$i++) {
					echo "<td align='center' width='215px' valign='top' >";
					if($row != false) {
						$link_anh="hinh_anh/san_pham/".$row['hinh_anh'];
						$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$row['id'];
						$gia=$row['gia'];
						$gia=number_format($gia,0,",",".");
						echo "<div class='lazyload_item single_item trang_chu'>
								<a href='".$link_chi_tiet."'><img src='".$link_anh."'></a>
								<h5><a href='".$link_chi_tiet."'>".$row['ten']."</a></h5>
								<p>".$gia."<u>đ</u></p>
							</div>";
					}
					else {
						echo "&nbsp;";
					}
					echo "</td>";
					if($i!=3) {
						$row = $result->fetch_assoc();
					}
				}
				echo "</tr>";
			}
			echo "</table>";
			$stmt->close();
			$conn->close();
		?>
	</body>
</html>