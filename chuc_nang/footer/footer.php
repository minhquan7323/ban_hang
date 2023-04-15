<?php 
	$tv="select * from footer limit 0,1";
	$conn = new mysqli("localhost", "root", "", "ban_hang");
  $tv_1 = mysqli_query($conn, $tv);
  $tv_2 = mysqli_fetch_array($tv_1);
  echo $tv_2['html'];
?>
<!-- <?php
echo'<footer class="footer">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-4">
            <h4>GIỚI THIỆU</h4>
            <p>Đến với Dekor, bạn hoàn toàn yên tâm để chọn được cho mình một bộ nội thất phù hợp nhất, kết hợp đầy đủ, hài hòa các yếu tố về màu sắc, kiểu dáng, kích thước để làm cho không gian ngôi nhà bạn trở nên ấn tượng hơn!</p>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4 addr">
            <h4>ĐỊA CHỈ LIÊN HỆ</h4>
            <p><i class="fas fa-location-dot"></i>Đường Số 1, Quận 1, TP. Hồ Chí Minh, Việt Nam</p>
            <p class="phone_num"><i class="fas fa-phone"></i><a href="">+84 123 456 789</a></p>
            <ul>
                <li><a href=""><i class="ti-facebook"></i></a></li>
                <li><a href=""><i class="ti-twitter"></i></a></li>
                <li><a href=""><i class="ti-email"></i></a></li>
                <li><a href=""><i class="ti-youtube"></i></a></li>
            </ul>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-4 news">
            <h4>TIN MỚI</h4>
            <div class="news_item row">
                <div class="col-2 news_img">
                    <img src="/NhomA03/SanPham/img/news/news_1.png">
                </div>
                <div class="col-9 news_info">
                    <h5><a href="/NhomA03/header/TinTuc1.html">Bí quyết bảo quản nội thất gỗ</a></h5>
                    <p>11/11/2022</p>
                </div>
            </div>
            <div class="news_item row">
                <div class="col-2 news_img">
                    <img src="/NhomA03/SanPham/img/news/news_2.png">
                </div>
                <div class="col-9 news_info">
                    <h5><a href="/NhomA03/header/Tintuc2.html">Kinh nghiệm mua, bảo quản nội thất</a></h5>
                    <p>11/11/2022</p>
                </div>
            </div>
            <div class="news_item row">
                <div class="col-2 news_img">
                    <img src="/NhomA03/SanPham/img/news/news_3.png">
                </div>
                <div class="col-9 news_info">
                    <h5><a href="/NhomA03/header/Tintuc3.html">Bố trí nội thất, cần tránh những gì ?</a></h5>
                    <p>11/11/2022</p>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>';
?> -->