<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../content/css/dangky.css">
    <style>
        
    </style>
</head>
<body>
    <?php
        require "../dao/pdo.php";
        require "../dao/loai.php";
        require "../dao/hang_hoa.php";
    ?>
    <div class="container">
        <?php
        require 'inc/header.php';
        ?>
        <main>
            
        <div class="dangky">
                <form action="" method="post"  enctype="multipart/form-data">
                    <p>
                        Họ và tên
                    </p>
                    <input type="text" name="name"  >
                    <p>
                        Mật khẩu
                    </p>
                    <input type="password" name="pass" >
                    <p>
                        Xác nhận mật khẩu
                    </p>
                    <input type="password" name="repass" >
                    
                    <p>
                        Email
                    </p>
                    <input type="email" name="email" >
                    <p>
                    <button type="submit" name="btnsignup">
                        Đăng ký
                    </button>
                    </p>
                </form>
                <?php
                    if (isset($_POST['btnsignup'])) {
                       
                        $name=$_POST['name'];
                        $pass=$_POST['pass'];
                        $repass=$_POST["ngsinh"];
                        $email=$_POST["email"];
                        $sdt=$_POST["sdt"];
                        
                        
            
                       
                        $sql="insert into khach_hang values (null,'$account','$pass','$name','','$email','$sdt','$ngaysinh','')";
                        $kq=$conn-> prepare($sql);
                        if($kq->execute()){
                            echo "Thanh cong";
                            header("Location: home.php");
                            exit;
                        }
                        else
                        echo "That bai";
                    
                    }
                ?>
            </div>
            <?php 
            require 'inc/aside.php';
            ?>
        </main>

        
        <?php
            require 'inc/footer.php';

        ?>
    </div>
</body>
</html>