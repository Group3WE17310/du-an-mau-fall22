<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        require "../dao/pdo.php";
        require "../dao/binh_luan.php";
?>
    <div class="container">
        <?php
            require "inc/header.php"
        ?>
        <h2>QUẢN TRỊ BÌNH LUẬN</h2>
        
        <table border="1" style="border-collapse:collapse; width:100%;">
            <tr>
                <td>Mã bình luận</td>
                <td>Nội dung</td>
                <td>Mã hàng hóa</td>
                <td>Mã khách hàng</td>
                <td>Ngày bình luận</td>
                <td></td>
            </tr>
            <?php
            if (isset($_GET['ma_bl'])) {
                binh_luan_delete($_GET['ma_bl']);
            }
                $ds_bl=binh_luan_select_all();
                
                foreach($ds_bl as $rows){
                    $del_link="a_binhluan.php?ma_bl=".$rows['ma_bl'];
            ?>
                <tr>
                    <td><?php echo $rows['ma_bl'] ?></td>
                    <td><?php echo $rows['noi_dung'] ?></td>
                    <td><?php echo $rows['ma_hh'] ?></td>
                    <td><?php echo $rows['ma_kh'] ?></td>
                    <td><?php echo $rows['ngay_bl'] ?></td>
                    <?php echo "<td><a href=".$del_link." >Xoá</a></td>" ?>
                </tr>
            <?php            
                } 
            ?>  
        </table>
        

        
    </div>
</body>
</html>