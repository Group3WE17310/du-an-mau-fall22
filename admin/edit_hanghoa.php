<?php
require "../dao/pdo.php";
require "../dao/hanghoa.php";
    if (isset($_GET['ma_hh'])) {
        $ma_hh=$_GET['ma_hh'];
        $edit_hh=hh_select_by_id($ma_hh);
        
    }
    
?>
        <form action="" method="POST" enctype="multipart/form-data">
            <p>Mã loại</p><input type="text" name="ma_hh " placeholder="auto number" disabled>
            <p>Tên hàng hoá</p><input type="text" name="ten_hh">
            <p>Đơn giá</p><input type="text" name="don_gia">
            <p>Giảm giá</p><input type="text" name="giam_gia">
            <p>Hình minh hoạ</p><input type="file" name="img">
            <p>Ngày nhập</p><input type="date" name="ngay_nhap">
            <p>Mô tả</p><input type="text" name="mo_ta">
            <p>Đặc biệt</p><input type="text" name="dac_biet">
            <p>Số lượt xem</p><input type="text" name="so_luot_xem">
            <p>Mã loại</p><input type="text" name="ma_loai">
            <button name="btn_update"> Sửa</button>
        </form>
        <?php
            if(isset($_POST['btn_update'])){
                
                $ten_hh=$_POST['ten_hh'];
                $don_gia=$_POST['don_gia'];
                $giam_gia=$_POST['giam_gia'];
                $ngay_nhap=$_POST['ngay_nhap'];
                $mo_ta=$_POST['mo_ta'];
                $dac_biet=$_POST['dac_biet'];
                $so_luot_xem=$_POST['so_luot_xem'];
                $ma_loai=$_POST['ma_loai'];

                $img_name=$_FILES['img']['name'];
                $img_tmp=$_FILES['img']['tmp_name'];
                move_uploaded_file($img_tmp,'../layout/img/'.$img_name);

                if ($img_name==null) {
                    $img_name= $edit_hh['img'];
                }

                hh_insert($ten_hh,$don_gia,$giam_gia,$img_name,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai);
                header("Location: a_hanghoa.php");


            }
        ?>