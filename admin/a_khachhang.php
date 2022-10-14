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
        require "../dao/pdo.php";
        require "../dao/khach_hang.php";
?>
    <div class="container">
        <?php
            require "inc/header.php"
        ?>
        <h2>QUẢN LÝ KHÁCH HÀNG</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" hidden>
        <p>
            Họ tên: <input type="text" name="ho_ten">

        </p>        
        <p>
            Mật khẩu: <input type="text" name="mat_khau" id="">
        </p>        
        <p>
            Kích hoạt: <input type="text" name="kich_hoat" id="">
        </p>
        <p>
            Hình ảnh: <input type="file" name="img" id="">
        </p>
        <p>
            Email: <input type="text" name="email" id="">
        </p>
        <p>
            Vai trò: <input type="text" name="vai_tro" id="">
        </p>
        <input type="submit" value="Thêm mới" name="btn_insert" id="">
        </form>
        <?php
            if (isset($_POST['btn_insert'])) {
                $ho_ten=$_POST['ho_ten'];
                $mat_khau=$_POST['mat_khau'];
                $kich_hoat=$_POST['kich_hoat'];
                $email= $_POST['email'];
                $vai_tro=$_POST['vai_tro'];
                $img_name=$_FILES['img']['name'];
                $img_tmp=$_FILES['img']['tmp_name'];

                move_uploaded_file($img_tmp,'../layout/img/'.$img_name);

                kh_insert($mat_khau,$ho_ten,$kich_hoat,$img_name,$email,$vai_tro);
            }
        ?>
        
        <table border="1" style="border-collapse:collapse; width:100%;">
            <tr>
                <td>Mã khách hàng</td>
                <td>Mật khẩu</td>
                <td>Họ tên</td>
                <td>Kích hoạt</td>
                <td>AVT</td>
                <td>Email</td>
                <td>Vai trò</td>
                <td></td>
                <td></td>
            </tr>
            <?php
            if (isset($_GET['ma_kh'])) {
                kh_delete($_GET['ma_kh']);
            }
                $ds_kh=kh_select_all();
                
                foreach($ds_kh as $row){
                    $del_link="a_khachhang.php?ma_kh=".$row['ma_kh'];
            ?>
                <tr>
                    <td><?php echo $row['ma_kh'] ?></td>
                    <td><?php echo $row['mat_khau'] ?></td>
                    <td><?php echo $row['ho_ten'] ?></td>
                    <td><?php echo $row['kich_hoat'] ?></td>
                    <td><?php echo $row['hinh'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['vai_tro'] ?></td>
                    <td><a href="edit_khachhang.php?ma_kh=<?php echo$row['ma_kh'] ?>">Sửa</a> </td>
                    <?php echo "<td><a href=".$del_link." >Xoá</a></td>" ?>
                </tr>
            <?php            
                } 
            ?>  
        </table>
        

        
    </div>
</body>
</html>