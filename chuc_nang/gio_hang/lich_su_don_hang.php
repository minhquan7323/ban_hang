<div>
<?php
    $conn = new mysqli("localhost", "root", "", "ban_hang");
    $query = "SELECT hoa_don.*, nguoi_dung.* FROM hoa_don INNER JOIN nguoi_dung ON hoa_don.nguoi_dung_id = nguoi_dung.nguoi_dung_id WHERE hoa_don.nguoi_dung_id = " . $_SESSION['uid'];
    $result = mysqli_query($conn, $query);
    echo ' <h4 class="title">Lịch sử đơn hàng</h4>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $link_xem="?thamso=xem_hoa_don&id=".$row['id'];
?>
            <div>
                <table class="lsdh">
                    <tr>
                        <th width="300px">Tên sản phẩm</th>
                        <th width="100px">Giá</th>
                        <th width="100px">Số lượng</th>
                        <th width="100px">Tổng cộng</th>
                        <th width="100px">Chi tiết</th>
                    </tr>
                    <?php
                        $hang_duoc_mua = $row['hang_duoc_mua'];
                        $m = explode("[|||||]", $hang_duoc_mua);    
                        $tong_lon = 0;

                        for ($i = 0; $i < count($m); $i++) {
                            if (isset($m[$i]) && $m[$i] != "") {
                                $stt = $i + 1;
                                $m_2 = explode("[|||]", $m[$i]);
                                $id_sp = $m_2[0];
                                $sl_sp = $m_2[1];
                                $tv_sp = "SELECT id, ten, gia FROM san_pham WHERE id = '$id_sp'";
                                $tv_sp_1 = mysqli_query($conn, $tv_sp);
                                $tv_sp_2 = mysqli_fetch_array($tv_sp_1);
                                $ten = $tv_sp_2['ten'];
                                $gia = $tv_sp_2['gia'];
                                $tong = $gia * $sl_sp;
                                $tong_lon += $tong;

                                if ($sl_sp != 0) {
                                    ?>
                                    <tr>
                                        <td><?php echo $ten; ?></td>
                                        <td><?php echo number_format($gia, 0, ",", "."); ?><u>đ</u></td>
                                        <td><?php echo $sl_sp; ?></td>
                                        <td><?php echo number_format($tong, 0, ",", "."); ?><u>đ</u></td>
                                        <td></td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                    ?>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Tổng tiền:</th>
                        <th><?= number_format($tong_lon, 0, ",", ".")."đ"; ?></th>
                        <th><a href="<?php echo $link_xem; ?>">Xem</a></th>
                    </tr>
                </table>
            </div>
<?php
        }
    }
?>
</div>