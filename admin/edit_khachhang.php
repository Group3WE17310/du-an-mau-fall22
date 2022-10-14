<?php
require "../dao/pdo.php";
require "../dao/khach_hang.php";
    if (isset($_GET['ma_kh'])) {
        $ma_kh=$_GET['ma_kh'];
        $edit_kh=kh_select_by_id($ma_kh);
        
    }
    
?>
<form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="<?php echo $edit_kh['ma_kh'] ?>" readonly>
        <p>
            Họ tên: <input type="text" name="ho_ten" value="<?php echo $edit_kh['ho_ten'] ?>">

        </p>        
        <p>
            Mật khẩu: <input type="text" name="mat_khau" value="<?php echo $edit_kh['mat_khau'] ?>">
        </p>        
        <p>
            Kích hoạt: <input type="text" name="kich_hoat" value="<?php echo $edit_kh['kich_hoat'] ?>">
        </p>
        <p>
            Hình ảnh: <input type="file" name="img" >
        </p>
        <p>
            Email: <input type="text" name="email" value="<?php echo $edit_kh['email'] ?>">
        </p>
        <p>
            Vai trò: <input type="text" name="vai_tro" value="<?php echo $edit_kh['vai_tro'] ?>">
        </p>
        <input type="submit" value="Cập nhật lại" name="btn_update" >
        </form>
        <?php
            if (isset($_POST['btn_update'])) {
                $ho_ten=$_POST['ho_ten'];
                $mat_khau=$_POST['mat_khau'];
                $kich_hoat=$_POST['kich_hoat'];
                $email= $_POST['email'];
                $vai_tro=$_POST['vai_tro'];
                $img_name=$_FILES['img']['name'];
                $img_tmp=$_FILES['img']['tmp_name'];

                if ($img_name==null) {
                    $img_name= $edit_kh['img'];
                }

                move_uploaded_file($img_tmp,'../layout/img/'.$img_name);

                kh_update($ma_kh,$mat_khau,$ho_ten,$kich_hoat,$img_name,$email,$vai_tro);
                header("Location: a_khachhang.php");
                
            }
        ?>