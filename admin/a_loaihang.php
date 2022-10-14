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
        require '../dao/pdo.php';
        require '../dao/loai.php'; 
    ?>
    <div class="container">
        <?php
            require "inc/header.php"
        ?>
        <h2>QUẢN LÝ LOẠI HÀNG</h2>




        <table border="1" style="border-collapse:collapse; width:100%;">
            <tr>
                <td>Mã Loại</td>
                <td>Tên loại</td>
                <td></td>
                <td></td>
            </tr>
            <?php
                $loaihang=loai_select_all();
                foreach($loaihang as $row){
                extract($row);
                $del_link="a_loai.php?ma_loai=".$ma_loai;
            ?>
                <tr>
                    <td><?php echo $row['ma_loai'] ?></td>
                    <td><?php echo $row['ten_loai'] ?></td>
                    <td><a href="edit_loai.php?ma_loai=<?php echo$row['ma_loai'] ?>">Sửa</a> </td>
                    <td><?php echo "<td><a href=".$del_link." >Xoá</a></td>" ?></td>
                    
                </tr>
            <?php            
                } 
            ?>  
        </table>
        
        <h2>THÊM LOẠI HÀNG</h2>
        <form action="" method="POST">
            <p>Mã loại</p><input type="text" name="ma_loai" placeholder="auto number" readonly>
            <p>Tên loại</p><input type="text" name="ten_loai"><br>
            <input type="submit" value="Thêm mới" name="btn_insert" id="">
        </form>
        <?php
            if(isset($_POST['btn_insert'])){
                $ten_loai=$_POST['ten_loai'];
                loai_insert($ten_loai);
            }
            
        ?>
    </div>
    </div>

    <?php 
        if(isset($_GET['ma_loai'])){
            loai_delete($_GET['ma_loai']);
        }
    ?>
</body>
</html>