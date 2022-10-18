<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content{
            display: flex;
            align-items: center;
            margin-left: 20px;
            /* justify-content: space-around; */
        }
        .text{
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <?php
        require 'inc/header.php';
        require '../dao/pdo.php';
        require '../dao/hang_hoa.php';
    ?>
    <?php
        $hang_hoa = hh_select_by_id($ma_hh);
        extract($hang_hoa);
        hh_tang_luot_xem($ma_hh);
    ?>
    <div class="row-main">
        <div class="row">
            <h1>SẢN PHẨM CHI TIẾT</h1>
            <?php
            if(isset($_GET['ma_hh'])){
                $ma_hh=$_GET['ma_hh'];
                $sql="select * from hang_hoa where ma_hh=$ma_hh";
                $dssp = hh_select_by_id($ma_hh);
                foreach($dssp as $sp){
            ?>
            <div class="content">
                <div class="img"><img src="../content/img/<?php echo $sp ['hinh'] ?>"></div>
                <div class="text">
                    <h2><?php echo $sp['ten_hh'] ?></h2>
                    <hr>
                    <p> <?php echo $sp['mo_ta'] ?>
                    </p><br>
                    <div class="soluong">
                            <button onclick="giam()">-</button>
                            <input type="text" value="1" id="sl">
                            <button onclick="tang()">+</button>
                    </div>
                    <span> <?php echo number_format($sp['don_gia']) ?></span>
                    <br>
                    <button>Đặt mua</button>
                </div>
            </div>

            <?php        
                }
            }
            ?>
            
            <div class="buy">
                <h3>MÔ TẢ SẢN PHẨM</h3>
                <p>
                ✔️  Tên sản phẩm: Quần jean nam <br><br>
                - CHẤT LƯỢNG: Chất vải jean CHÍNH PHẨM gồm 95% cotton ( thấm hút, vải mềm) và 5% spandex ( độ co dãn).<br>
                - GIÁ CẢ : Chúng tôi trực tiếp sản xuất với số lượng lớn. Nên so với các quần cùng chất lượng giá cả của chiếc quần jean baggy thì giá tốt nhất cho bạn hiện tại.<br>
                ✔️ THAM KHẢO  SIZE QUẦN :<br>
                👖Size 26 (Từ 36- 42kg Cao Dưới 1m71)<br>
                👖Size 27  (Từ 42 - 49kg Cao Dưới 1m71)<br>
                👖 Size 28  (Từ 50 - 54kg Cao Dưới 1m75)<br>
                👖 Size 29 (Từ 55 - 58 kg Cao Dưới 1m80) <br>
                👖 Size 30  ( Từ 59- 62 kg Cao Dưới 1m80)<br>
                👖 Size 31 (Từ 63 - 65 kg Cao Dưới 1m80)<br>
                👖 Size 32  (Từ 66 - 69 kg Cao Dưới 1m80)  <br>
                👖 Size 33  (Từ 70- 73 kg Cao Dưới 1m85) <br>
                </p>
            </div>
            </article>
            <div class="ts">
                <h2>⭐⭐⭐ CAM KẾT HÀNG NHƯ HÌNH CHỤP - HOÀN TIỀN NẾU THẤY KHÔNG HÀI LÒNG. </h2>
                <h2>⭐⭐⭐ HÃY INBOX CHO SHOP KHI SẢN PHẨM CÓ VẤN ĐỀ ( ĐỔI SIZE, SP BỊ LỖI...) ĐỂ HỖ TRỢ TRƯỚC KHI ĐÁNH GIÁ.</h2>
                <br>
                <h3>✔️ QUẦN JEANS BAGGY  DÁNG ỐNG SUÔNG NAM CAO CẤP</h3>
                <hr>
                <p>- Có phải bạn đang muốn tìm cho mình một chiếc quần jean baggy cao cấp mang style hàn quốc? May mắn là bạn đã tìm thấy chúng tôi.<br><br>
                -  Chiếc quần jean baggy dành cho  nam này cửa hàng chúng tôi bán khoảng 600 chiếc mỗi tháng. Đã bán hơn 6.000 chiếc chỉ tính riêng trên hệ thống của Shopee Việt Nam, chưa kể đến những kênh bán khác!<br><br>
                -  Bạn cũng sẽ là một trong số những người sẽ sở hữu chiếc quần jean baggy mang phong cách hàn quốc này. Bởi vì đây là một chiếc quần jean mà cực kỳ dễ phối đồ từ áo thun, hoodie, áo khoác..cho đến các loại sneakers, boots..<br><br>
            </div><hr><br>
        </div>
        <div class="row">
            <?php
                require '../dao/binh_luan.php';
                if(binh_luan_exist("noi_dung")){
                $ma_kh = $_SESSION['user']['ma_kh'];
                $ngay_bl = date_format(date_create(), 'Y-m-d');
                binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
                }
                $binh_luan_list = binh_luan_select_by_hang_hoa($ma_hh); 
                foreach ($binh_luan_list as $bl) {
                echo "<li>$bl[noi_dung] <i><b>$bl[ma_kh]</b>, $bl[ngay_bl]</i></li>";
                }
                if(!isset($_SESSION['user'])){
                echo "<b>Đăng nhập để bình luận về sản phẩm này</b>";
                } else{
                ?>
                <form action="<?= $_SERVER["REQUEST_URI"] ?>" method="post">
                    <input name="noi_dung"/><button>Gửi</button>
                </form> 
            <?php }?>
            <!-- <div class="comment">
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=640176237077192&autoLogAppEvents=1"
                    nonce="lv320ARo">
                </script>
                <div class="fb-like"
                data-href="https://caodang.fpt.edu.vn/tuyen-sinh-cao-dang-xet-tuyen?utm_source=FGS&amp;utm_medium=CDFHN&amp;utm_campaign=poly.edu&amp;gclid=Cj0KCQiAmKiQBhClARIsAKtSj-nDmcFrC6fH6OlkJP8cY_26WN_r8ZTPnFooszyw8Dk8czU-dleXbsUaAgl9EALw_wcB"
                data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div><br>
                <div class="fb-comments"
                data-href="https://caodang.fpt.edu.vn/tuyen-sinh-cao-dang-xet-tuyen?utm_source=FGS&amp;utm_medium=CDFHN&amp;utm_campaign=poly.edu&amp;gclid=Cj0KCQiAmKiQBhClARIsAKtSj-nDmcFrC6fH6OlkJP8cY_26WN_r8ZTPnFooszyw8Dk8czU-dleXbsUaAgl9EALw_wcB"
                data-width="100%" data-numposts="5"></div>
            </div> -->
        </div>
        <div class="row">
            <ul>
                <?php
                // include '../dao/hang_hoa.php';
                $hh_cung_loai = hang_hoa_select_by_loai($ma_loai);
                foreach ($hh_cung_loai as $hh) {
                echo "<li><a href='detail.php?ma_hh=$hh[ma_hh]'>$hh[ten_hh]</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>

        <?php
            require 'inc/footer.php';
        ?>

        <script src="../content/js/home.js"></script>
    
</body>
</html>
