<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        aside{
    width: 25%;
    
}
aside form{
    border: 1px solid gray;
    padding:0 5%;
    margin-bottom: 10px;
}
aside form p{
    margin-bottom: 10px;
}
form p #acc, #pass{
    width: 90%;
}
.card{
    width: 100%;
    margin-bottom: 10px;
   
}

 .card li{
    list-style-type: none;
    border: 1px solid gray;
    padding-left: 10px;
}
.card li:first-child{
    background-color: gray;
}
.card li:last-child{
    text-align: center;
}

.top5 li{
    list-style-type: none;
    border: 1px solid gray;
    padding-left: 10px;
}
.top5 li:first-child{
    background-color: gray;
}
    </style>
</head>
<body>
<aside>

                <form action="" method="post">
                    <h1>Tài khoản</h1>

                    <p>
                        <Label>Tên đăng nhập</Label>
                        <br>
                        <input type="text" id="acc">
                    </p>
                    <p>
                        <Label>Mật khẩu</Label>
                        <br>
                        <input type="password" id="pass">
                    </p>
                    <p>
                        <input type="checkbox" name="saveAcc" id="" >
                    <Label>Ghi nhớ tài khoản?</Label>
                    </p>
                    <p>
                        <Button>Đăng nhập</Button>
                    </p>
                    
                    <p>
                        &#9679<a href="fgpass.php" >Quên mật khẩu</a> <br>
                        &#9679<a href="dangky.php" >Đăng ký thành viên</a>
                    </p>
                </form>

                <div class="card">
                    
                        <li>Danh mục</li>
                        <?php
                            $dsloai =loai_select_all();
                            foreach ($dsloai as $loai) {
                                extract($loai)
                        ?>
                        
                        <li><a href=""><?php echo $ten_loai ?></a></li>
                        <?php
                            }
                        ?>
                        <li>
                            <input type="text" placeholder="Từ khóa tìm kiếm">
                        </li>
                </div>
                <div class="top5">
                    <li>Top 5 yêu thích</li>
                    <?php
                        $dshh =hang_hoa_select_all_view();
                        foreach ($dshh as $hh) {
                           
                    ?>
                        <li><a href=""><?php echo $hh['ten_hh'] ?></a></li>
                        
                    <?php
                        }
                    ?>
                </div>
            </aside>
</body>
</html>