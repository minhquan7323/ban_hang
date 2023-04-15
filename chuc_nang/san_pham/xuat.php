<?php
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$tv = "SELECT * FROM menu_doc ORDER BY id";
	$tv_1 = $conn->query($tv);
	while ($tv_2 = $tv_1->fetch_assoc())
		if ($tv_2['id'] == $_GET['id'])
			echo "<h3 class='title'>".$tv_2['ten']."</h3>";
?>
<form action="./" method="get">
	<input type="hidden" name="thamso" value="xuat_san_pham_loc">	
	<div>
		<div class="btn-group">
			<button type="button" class="btn btn-secondary dropdown-toggle bo_loc" data-bs-toggle="dropdown" aria-expanded="false">
				Bộ lọc
			</button>
			<ul class="dropdown-menu" style="width:300px">
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="0-200000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">0 - 200.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="200000-1000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">200.000 - 1.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="1000000-5000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">1.000.000 - 5.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="5000000-10000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">5.000.000 - 10.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<div class="form-check">
						<input type="checkbox" name="loc_gia[]" value="10000000" class="form-check-input" id="flexCheckDefault">
						<label class="form-check-label" for="flexCheckDefault">>10.000.000 <u>đ</u></label>
					</div>
				</li>
				<li>
					<hr class="dropdown-divider">
				</li>
				<li>
					<button type="submit" name="submit_loc" class="btn btn-secondary">Lọc</button>
				</li>
			</ul>
		</div>
	</div>
<table>
	<?php 
		$id=$_GET['id'];
		$so_du_lieu=20;
		$tv="select count(*) from san_pham where thuoc_menu='$id';";
		$conn = new mysqli("localhost", "root", "", "ban_hang");
		$tv_1 = mysqli_query($conn, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$so_trang=ceil($tv_2[0]/$so_du_lieu);
		if(!isset($_GET['trang'])){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$so_du_lieu;}
		$tv="select id,ten,gia,hinh_anh,thuoc_menu from san_pham where thuoc_menu='$id' order by id desc limit $vtbd,$so_du_lieu";
		$tv_1=mysqli_query($conn, $tv);
		while($tv_2=mysqli_fetch_array($tv_1)) {
			echo "<tr>";
				for($i=1;$i<=3;$i++) {
					echo "<td align='center' width='215px' valign='top' >";
						if($tv_2!=false) {
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
						else 
						{
							echo "&nbsp;";
						}
					echo "</td>";
					if($i!=3) {
						$tv_2=mysqli_fetch_array($tv_1);
					}
				}
			echo "</tr>";
		}
	?>
</table>
<div class="category_paging">
<?php 
	for($i=1;$i<=$so_trang;$i++) {
		$link="?thamso=xuat_san_pham&id=".$_GET['id']."&trang=".$i;
		echo "<a href='$link' class='phan_trang'>";
		echo $i;
		echo " ";
		echo "</a>";
	}
?>
</div>