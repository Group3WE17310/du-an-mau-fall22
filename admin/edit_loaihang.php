<?php
require "../dao/pdo.php";
require "../dao/loai.php";
    if (isset($_GET['ma_loai'])) {
        $ma_loai=$_GET['ma_loai'];
        $edit_loai=loai_select_by_id($ma_loai);
        
    }
    
?>
        <form action="" method="POST">
            <p>Mã loại</p><input type="text" name="ma_loai"  disabled  value="<?php echo $edit_loai['ma_loai'] ?>">
            <p>Tên loại</p><input type="text" name="ten_loai" value="<?php echo $edit_loai['ten_loai'] ?>"><br>
            <input type="submit" value="Sửa" name="btn_update" id="">
        </form>
        <?php
            if (isset($_POST['btn_update'])) {
                $ten_loai=$_POST['ten_loai'];
                loai_update($ma_loai,$ten_loai);

                header("Location: a_loai.php");
                
            }
        ?>