
<h5 class='thong_bao_tim_kiem'>Sản phẩm đã lọc</h5>
<table>
	<?php
		if(isset($_GET['loc_gia'])&&isset($_GET['phan_loai'])) {
			$conn = new mysqli("localhost", "root", "", "ban_hang");
			$so_du_lieu = 15;
			if(isset($_GET['submit_loc'])) {
				$phan_loai_arr = $_GET['phan_loai'];
				$loc_gia_arr = $_GET['loc_gia'];
				$loc_query = '';
				foreach($loc_gia_arr as $value2) {
					foreach($phan_loai_arr as $value) {
						if($loc_query == '') $loc_query = ' WHERE trang_chu="co" and ';
						else $loc_query .= ' OR ';
						$loc_query .= "(thuoc_menu = '$value' AND ";
						if($value2 == '10000000') $loc_query .= 'gia > 10000000)';
						else {
							$range_arr = explode('-', $value2);
							$loc_query .= "gia BETWEEN $range_arr[0] AND $range_arr[1])";
						}
						}
				}
				$tv_loc = "SELECT count(*) FROM san_pham $loc_query";
				$tv_loc_1 = mysqli_query($conn, $tv_loc);
				$tv_loc_2 = mysqli_fetch_array($tv_loc_1);
				$so_trang = ceil($tv_loc_2[0] / $so_du_lieu);
				if(!isset($_GET['trang'])) $vtbd = 0;
				else $vtbd = ($_GET['trang'] - 1) * $so_du_lieu;

				$tv = "SELECT id,ten,gia,hinh_anh,thuoc_menu FROM san_pham $loc_query ORDER BY id DESC LIMIT $vtbd,$so_du_lieu";
				$tv_1 = mysqli_query($conn, $tv);

				while($tv_2 = mysqli_fetch_array($tv_1)) {
					echo "<tr>";
					for($i = 1; $i <= 3; $i++) {
						echo "<td align='center' width='215px' valign='top'>";
						if($tv_2 != false) {
							$link_anh = "hinh_anh/san_pham/" . $tv_2['hinh_anh'];
							$link_chi_tiet = "?thamso=chi_tiet_san_pham&id=" . $tv_2['id'];
							$gia = $tv_2['gia'];
							$gia = number_format($gia, 0, ",", ".");
							echo "<div class='lazyload_item single_item trang_chu'>
									<a href='$link_chi_tiet'><img src='$link_anh'></a>
									<h5><a href='$link_chi_tiet'>" . $tv_2['ten'] . "</a></h5>
									<p>" . $gia . "<u>đ</u></p>
									</div>";
						}
						else  {
							echo "&nbsp;";
						}
						echo "</td>";
						if($i != 3) {
							$tv_2 = mysqli_fetch_array($tv_1);
						}
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			echo '<div class="category_paging">';
			for($i=1;$i<=$so_trang;$i++) {
				$link = "?thamso=xuat_san_pham_loc&loc_gia%5B%5D=".urlencode(implode('&loc_gia%5B%5D=', $loc_gia_arr))."&phan_loai%5B%5D=".urlencode(implode('&phan_loai%5B%5D=', $phan_loai_arr))."&submit_loc="."&trang=".$i;
				$link = str_replace('%3D', '=', $link);
				$link = str_replace('%26', '&', $link);
				$link = str_replace('%25', '%', $link);
				echo "<a href='$link' class='phan_trang'>";
				echo $i;
				echo "</a> ";
			}
			echo '</div>';
		}
		else if(isset($_GET['loc_gia'])) {
			$conn = new mysqli("localhost", "root", "", "ban_hang");
			$so_du_lieu = 15;
			if(isset($_GET['submit_loc'])) {
				$loc_gia_arr = $_GET['loc_gia'];
				$loc_gia_query = '';
				foreach($loc_gia_arr as $value) {
					if($loc_gia_query == '') $loc_gia_query = ' WHERE trang_chu="co" and ';
					else $loc_gia_query .= ' OR ';
					if($value == '10000000') $loc_gia_query .= '(gia > 10000000)';
					else {
						$range_arr = explode('-', $value);
						$loc_gia_query .= "(gia BETWEEN $range_arr[0] AND $range_arr[1])";
					}
				}
				$tv_loc = "SELECT count(*) FROM san_pham $loc_gia_query";
				$tv_loc_1 = mysqli_query($conn, $tv_loc);
				$tv_loc_2 = mysqli_fetch_array($tv_loc_1);
				$so_trang = ceil($tv_loc_2[0] / $so_du_lieu);
				if(!isset($_GET['trang'])) $vtbd = 0;
				else $vtbd = ($_GET['trang'] - 1) * $so_du_lieu;

				$tv = "SELECT id,ten,gia,hinh_anh,thuoc_menu FROM san_pham $loc_gia_query ORDER BY id DESC LIMIT $vtbd,$so_du_lieu";
				$tv_1 = mysqli_query($conn, $tv);

				while($tv_2 = mysqli_fetch_array($tv_1)) {
					echo "<tr>";
					for($i = 1; $i <= 3; $i++) {
						echo "<td align='center' width='215px' valign='top'>";
						if($tv_2 != false) {
							$link_anh = "hinh_anh/san_pham/" . $tv_2['hinh_anh'];
							$link_chi_tiet = "?thamso=chi_tiet_san_pham&id=" . $tv_2['id'];
							$gia = $tv_2['gia'];
							$gia = number_format($gia, 0, ",", ".");
							echo "<div class='lazyload_item single_item trang_chu'>
									<a href='$link_chi_tiet'><img src='$link_anh'></a>
									<h5><a href='$link_chi_tiet'>" . $tv_2['ten'] . "</a></h5>
									<p>" . $gia . "<u>đ</u></p>
									</div>";
						}
						else  {
							echo "&nbsp;";
						}
						echo "</td>";
						if($i != 3) {
							$tv_2 = mysqli_fetch_array($tv_1);
						}
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			echo '<div class="category_paging">';
			for($i=1;$i<=$so_trang;$i++) {
				$link = "?thamso=xuat_san_pham_loc&loc_gia%5B%5D=".urlencode(implode('&loc_gia%5B%5D=', $loc_gia_arr))."&submit_loc="."&trang=".$i;
				$link = str_replace('%3D', '=', $link);
				$link = str_replace('%26', '&', $link);
				$link = str_replace('%25', '%', $link);
				echo "<a href='$link' class='phan_trang'>";
				echo $i;
				echo "</a> ";
			}
			echo '</div>';
		}
		else if(isset($_GET['phan_loai'])) {
			$conn = new mysqli("localhost", "root", "", "ban_hang");
			$so_du_lieu = 15;
			if(isset($_GET['submit_loc'])) {
				$phan_loai_arr = $_GET['phan_loai'];
				$phan_loai_query = '';
				foreach($phan_loai_arr as $value) {
					if($phan_loai_query == '') $phan_loai_query = ' WHERE trang_chu="co" and ';
					else $phan_loai_query .= ' OR ';
					$phan_loai_query .= "(thuoc_menu = '$value')";
				}
				$tv_loc = "SELECT count(*) FROM san_pham $phan_loai_query";
				$tv_loc_1 = mysqli_query($conn, $tv_loc);
				$tv_loc_2 = mysqli_fetch_array($tv_loc_1);
				$so_trang = ceil($tv_loc_2[0] / $so_du_lieu);
				if(!isset($_GET['trang'])) $vtbd = 0;
				else $vtbd = ($_GET['trang'] - 1) * $so_du_lieu;

				$tv = "SELECT id,ten,gia,hinh_anh,thuoc_menu FROM san_pham $phan_loai_query ORDER BY id DESC LIMIT $vtbd,$so_du_lieu";
				$tv_1 = mysqli_query($conn, $tv);

				while($tv_2 = mysqli_fetch_array($tv_1)) {
					echo "<tr>";
					for($i = 1; $i <= 3; $i++) {
						echo "<td align='center' width='215px' valign='top'>";
						if($tv_2 != false) {
							$link_anh = "hinh_anh/san_pham/" . $tv_2['hinh_anh'];
							$link_chi_tiet = "?thamso=chi_tiet_san_pham&id=" . $tv_2['id'];
							$gia = $tv_2['gia'];
							$gia = number_format($gia, 0, ",", ".");
							echo "<div class='lazyload_item single_item trang_chu'>
									<a href='$link_chi_tiet'><img src='$link_anh'></a>
									<h5><a href='$link_chi_tiet'>" . $tv_2['ten'] . "</a></h5>
									<p>" . $gia . "<u>đ</u></p>
									</div>";
						}
						else  {
							echo "&nbsp;";
						}
						echo "</td>";
						if($i != 3) {
							$tv_2 = mysqli_fetch_array($tv_1);
						}
					}
					echo "</tr>";
				}
				echo "</table>";
			}
			echo '<div class="category_paging">';
			for($i=1;$i<=$so_trang;$i++) {
				$link = "?thamso=xuat_san_pham_loc&phan_loai%5B%5D=".urlencode(implode('&phan_loai%5B%5D=', $phan_loai_arr))."&submit_loc="."&trang=".$i;
				$link = str_replace('%3D', '=', $link);
				$link = str_replace('%26', '&', $link);
				$link = str_replace('%25', '%', $link);
				echo "<a href='$link' class='phan_trang'>";
				echo $i;
				echo "</a> ";
			}
			echo '</div>';
		} 
		else {
			echo "<h5 class='thong_bao_tim_kiem'>Bạn chưa chọn khoảng giá</h5>";
		}
?>