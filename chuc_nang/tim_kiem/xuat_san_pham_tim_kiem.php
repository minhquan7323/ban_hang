<?php 
	if(isset($_GET['tu_khoa']) && trim($_GET['tu_khoa'])!=""){ 
		$m=explode(" ",$_GET['tu_khoa']);    
		$chuoi_tim_sql="";
		for($i=0;$i<count($m);$i++){
			$tu=trim($m[$i]);
			if($tu!=""){
				$chuoi_tim_sql=$chuoi_tim_sql." ten like '%".$tu."%' or";
			}
		}

		$m_2=explode(" ",$chuoi_tim_sql);    
		$chuoi_tim_sql_2="";
		for($i=0;$i<count($m_2)-1;$i++){
			$chuoi_tim_sql_2=$chuoi_tim_sql_2.$m_2[$i]." ";
		} 

		$so_du_lieu=15;
		$tv="select count(*) from san_pham  where $chuoi_tim_sql_2";
		$conn = new mysqli("localhost", "root", "", "ban_hang");

		$tv_1 = mysqli_query($conn, $tv);
		$tv_2=mysqli_fetch_array($tv_1);
		$so_trang=ceil($tv_2[0]/$so_du_lieu);
		
		if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
		
		$tv="select id,ten,gia,hinh_anh,thuoc_menu from san_pham where $chuoi_tim_sql_2 order by id desc limit $vtbd,$so_du_lieu";

		$tv_1 = mysqli_query($conn, $tv);
		echo"<h5 class='thong_bao_tim_kiem'>Sản phẩm được tìm kiếm</h5>";
		echo "<table>";
		while($tv_2=mysqli_fetch_array($tv_1)){
			echo "<tr>";
				for($i=1;$i<=3;$i++){
					echo "<td align='center' width='215px' valign='top' >";
						if($tv_2!=false){
							$link_anh="hinh_anh/san_pham/".$tv_2['hinh_anh'];
							$link_chi_tiet="?thamso=chi_tiet_san_pham&id=".$tv_2['id'];
							$gia=$tv_2['gia'];
							$gia=number_format($gia,0,",",".");
							echo "<div class='lazyload_item single_item trang_chu'>
									<a href='".$link_chi_tiet."'><img src='".$link_anh."'></a>
									<h5><a href='".$link_chi_tiet."'>".$tv_2['ten']."</a></h5>
									<p>".$gia."<u>đ</u></p>
								</div>";
						}
						else{
							echo "&nbsp;";
						}
					echo "</td>";
					if($i!=3){
						$tv_2=mysqli_fetch_array($tv_1);
					}
				}
			echo "</tr>";
		}
		echo "</table>";
		echo '<div class="category_paging">';
			for($i=1;$i<=$so_trang;$i++) {
				$link="?thamso=tim_kiem&tu_khoa=".urlencode($_GET['tu_khoa'])."&trang=".$i."";
				echo "<a href='$link' class='phan_trang'>";
				echo $i;
				echo "</a> ";
			}
		echo '</div>';
	}
	else{
	echo "<h5 class='thong_bao_tim_kiem'>Bạn chưa nhập từ khóa</h5>";
	}
?>