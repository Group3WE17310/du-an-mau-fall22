<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/show-loaihang.css">
</head>
<body>
    <?php
         require '../dao/pdo.php';
         require '../dao/hanghoa.php'; 
    ?>
    <div class="container">
        <?php
            require "inc/header.php"
        ?>
        <h2>QUẢN LÝ LOẠI HÀNG</h2>
        <table border="1" style="border-collapse:collapse; width:100%;">
            <tr>
                <td>Mã hàng hoá</td>
                <td>Tên hàng hoá</td>
                <td>Đơn giá</td>
                <td>Giảm giá</td>
                <td>Hình minh hoạ</td>
                <td>Ngày nhập</td>
                <td>Mô tả</td>
                <td>Đặc biệt</td>
                <td>Số lượt xem</td>
                <td>Mã loại</td>
                <td></td>
                <td></td>
            </tr>
            <?php
                $hh=hang_hoa_select_all();
                foreach($hh as $row){
                    extract($row);
                    $del_link="a_hanghoa.php?ma_hh=".$ma_hh;
            ?>
                <tr>
                    <td><?php echo $row['ma_hh'] ?></td>
                    <td><?php echo $row['ten_hh'] ?></td>
                    <td><?php echo $row['don_gia'] ?></td>
                    <td><?php echo $row['giam_gia'] ?></td>
                    <td><?php echo $row['hinh'] ?></td>
                    <td><?php echo $row['ngay_nhap'] ?></td>
                    <td><?php echo $row['mo_ta'] ?></td>
                    <td><?php echo $row['dac_biet'] ?></td>
                    <td><?php echo $row['so_luot_xem'] ?></td>
                    <td><?php echo $row['ma_loai'] ?></td>
                    <td><a href="edit_hanghoa.php?ma_hh=<?php echo$row['ma_hh'] ?>">Sửa</a></td>
                    <td><?php echo "<td><a href=".$del_link." >Xoá</a></td>" ?></td>
                </tr>
            <?php            
                } 
            ?>  
        </table>
        <br>
        <h2>THÊM HÀNG HOÁ</h2>
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
            <button name="btn_insert"> Thêm hàng hoá</button>
        </form>
        <?php
            if(isset($_POST['btn_insert'])){
                
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

                hh_insert($ten_hh,$don_gia,$giam_gia,$img_name,$ngay_nhap,$mo_ta,$dac_biet,$so_luot_xem,$ma_loai);


            }  
        ?>
    </div>

    <?php 
        if(isset($_GET['ma_hh'])){
            hh_delete($_GET['ma_hh']);
        }
    ?> 
</body>
</html>