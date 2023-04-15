<?php 
	if(!isset($bien_bao_mat)){exit();}
?>
<?php 
	$so_dong_tren_mot_trang=10;
	if(!isset($_GET['trang'])){$_GET['trang']=1;}
	
	$tv="select count(*) from hoa_don";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	$so_trang=ceil($tv_2[0]/$so_dong_tren_mot_trang);
	
	$vtbd=($_GET['trang']-1)*$so_dong_tren_mot_trang;
	$tv="select * from hoa_don order by id desc limit $vtbd,$so_dong_tren_mot_trang";
	$tv_1 = mysqli_query($conn, $tv);
?>
<div class="content">
    <div class="row">
        <div class="title col-12 box_shadow">
            <b>Quản lý hóa đơn</b>
        </div>
    </div>
    <div class="row main_frame box_card box_shadow">
        <div>
            <form action="./" method="get">
                <input type="hidden" name="thamso" value="hoa_don">
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3 row">
                            <label class="col-4 col-form-label">Từ ngày</label>
                            <div class="col-8">
                            <input type="date" name="tu_ngay" class="form-control" min="1900-01-01" max="9999-12-31" style="width:200px">
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3 row">
                            <label class="col-4 col-form-label">Đến ngày</label>
                            <div class="col-8">
                                <input type="date" name="den_ngay" class="form-control" min="1900-01-01" max="9999-12-31" style="width:200px">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Lọc">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive-lg">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
						<th scope="col">ID đơn hàng</th>
                        <th scope="col">Tên Khách hàng</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Điện thoại</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày mua</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET['tu_ngay'], $_GET['den_ngay'])) {
                        $tu_ngay = $_GET['tu_ngay'];
                        $den_ngay = $_GET['den_ngay'];
                        $query = "SELECT * FROM hoa_don WHERE ngay_mua BETWEEN '$tu_ngay' AND '$den_ngay'";
                    } else $query = "SELECT * FROM hoa_don";
                    $query_run = mysqli_query($conn, $query);
                    if(mysqli_num_rows($query_run) > 0) {
                        foreach($query_run as $row) {
                ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['ten_nguoi_mua']; ?></td>
                                <td><?= $row['dia_chi']; ?></td>
                                <td><?= $row['dien_thoai']; ?></td>
                                <td><?= number_format($row['tong_tien'], 0, ",", ".")."đ"; ?></td>
                                <td></td>
                                <td><?= $row['ngay_mua']; ?></td>
                            </tr>
                <?php
                        }
                    }
                    else echo"<p class='thong_bao_sai'>Không tồn tại</p>";
                ?>
                </tbody>
            </table>
        </div>
        <div class="category_paging">
			<?php 
				for($i=1;$i<=$so_trang;$i++) {
					$link_phan_trang="?thamso=hoa_don&trang=".$i;
					echo "<a href='$link_phan_trang' class='phan_trang' >";
						echo $i;
					echo "</a> ";
				}
			?>
        </div>
    </div>
</div>


